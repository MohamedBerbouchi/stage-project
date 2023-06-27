<x-mail::message>
# Introduction

 
 
{!! nl2br($mailData["message"]) !!}


Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
