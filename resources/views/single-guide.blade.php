<x-layout>
    <article>
        <h1>{{$guide->title}}</h1>

        {!! $guide->body !!}

        <p style="text-align: center;width:100%;color:rgba(0, 0, 0, 0.3);font-family:Arial, Helvetica, sans-serif;">Date: {{date('d-m-Y', strtotime($guide->created_at))}}</p>
    </article>

</x-layout>