<x-mail::message>
# Introduction

Don't forget to check out your cart items.

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
