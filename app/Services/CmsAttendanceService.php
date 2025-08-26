<?php

namespace App\Services;

use DOMXPath;
use DOMDocument;

class CmsAttendanceService
{
    protected $loginUrl = 'https://cms.must.edu.pk:8082/';
    protected $targetUrl = 'https://cms.must.edu.pk:8082/Summary.aspx';
    protected function generateCookieFile()
    {
        return storage_path('app/cookies/' . uniqid('cms_', true) . '.txt');
    }


    public function fetchAttendance($request)
    {

        $rollSession = $request['roll_session'];
        $rollProgram = $request['roll_program'];
        $rollNumber = $request['roll_number'];
        $password = $request['password'];

        $cookieFile = $this->generateCookieFile();


        $ch = curl_init($this->loginUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            dd('Curl error: ' . curl_error($ch));
        }

        if (!$response) {
            dd('Empty response from login GET request');
        }

        file_put_contents('login_response.html', $response); // Save for inspection


        curl_close($ch);


        // Parse __VIEWSTATE, __VIEWSTATEGENERATOR, __EVENTVALIDATION
        $doc = new DOMDocument();
        libxml_use_internal_errors(true);

        $doc->loadHTML($response);
        $xpath = new DOMXPath($doc);

        $fields = ['__VIEWSTATE', '__VIEWSTATEGENERATOR', '__EVENTVALIDATION'];
        $values = [];

        foreach ($fields as $field) {
            $input = $xpath->query("//input[@name='$field']")->item(0);
            $values[$field] = $input ? $input->getAttribute('value') : '';
        }


        //Log in

        $postFields = http_build_query(array_merge($values, [
            'ddl_Session' => $rollSession,
            'ddl_Program' => $rollProgram,
            'txt_RollNo' => $rollNumber,
            'txt_Password' => $password,
            'btn_StudentSignIn' => 'Sign+In' // This is the submit button name; check actual HTML
        ]));


        $ch = curl_init($this->loginUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $response = curl_exec($ch);
        curl_close($ch);

        // Fetch Summary Page

        $ch = curl_init($this->targetUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile); // Reuse cookies
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Follow redirects if any
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        $response = curl_exec($ch);
        curl_close($ch);

        //Extract Data

        libxml_use_internal_errors(true);
        $dom = new DOMDocument();
        $dom->loadHTML($response);
        libxml_clear_errors();

        // Prepare XPath for querying
        $xpath = new DOMXPath($dom);

        // Find attendance table rows (excluding header row)
        $rows = $xpath->query("//table[@id='ctl00_DataContent_gvCourseSummary']/tr[position()>1]");

        // Final PHP associative array
        $attendance = [];

        foreach ($rows as $row) {
            $cols = $xpath->query(".//td", $row);

            if ($cols->length > 0) {
                $attendance[] = [
                    "S#" => trim($cols[0]->textContent),
                    "Course Title" => trim($cols[1]->textContent),
                    "Class" => trim($cols[2]->textContent),
                    "Faculty" => trim($cols[3]->textContent),
                    "Lectures" => trim($cols[4]->textContent),
                    "Theory Lectures" => trim($cols[5]->textContent),
                    "Present" => trim($cols[6]->textContent),
                    "Absent" => trim($cols[7]->textContent),
                    "Theory %" => trim($cols[8]->textContent),
                    "Lab Lectures" => trim($cols[9]->textContent),
                    "Lab Present" => trim($cols[10]->textContent),
                    "Lab Absent" => trim($cols[11]->textContent),
                    "Lab %" => trim($cols[12]->textContent),
                ];
            }
        }
        @unlink($cookieFile);
        return $attendance;
    }
}