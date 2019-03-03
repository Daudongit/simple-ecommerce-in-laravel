@component('mail::message')
# Contact Received

Thank you for your contact.

**User's Email:** {{ $request->email }}

**User's Name:** {{ $request->name }}

**User's Message:** {{ $request->message }}


This contact is from this website.

@component('mail::button', ['url' => config('app.url'), 'color' => 'green'])
Go to Website
@endcomponent

Regards,<br>
{{ config('app.name') }}
@endcomponent
