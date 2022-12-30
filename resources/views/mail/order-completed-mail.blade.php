<x-mail::message>
# Order Completed

Your order is completed and ready to go. See yaaah!

<x-mail::button :url="'http://localhost:8001/'">
Redirect to Shop
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
