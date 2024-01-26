<x-mail::message>
# Introduction

Hi, <b>{{ $name }}</b>
Your trial has ended today. To continue using our services, please click the button below to reactivate your membership.

<x-mail::button url="{{route('subscribe')}}">
Reactivate Membership
</x-mail::button>

Thanks,<br>
splenr
</x-mail::message>
