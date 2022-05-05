<div class="col-sm-12">
    {!! Form::label('name', __('forms.names')) !!}
    <p>{{ $customer->name }}</p>
</div>
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $customer->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $customer->updated_at }}</p>
</div>

{{--
 	name 	varchar(255) 	utf8mb4_unicode_ci 		No 	None 			Change Change 	Drop Drop

    More More

	3 	emailIndex 	varchar(255) 	utf8mb4_unicode_ci 		No 	None 			Change Change 	Drop Drop

    More More

	4 	email_verified_at 	timestamp 			Yes 	NULL 			Change Change 	Drop Drop

    More More

	5 	password 	varchar(255) 	utf8mb4_unicode_ci 		No 	None 			Change Change 	Drop Drop

    More More

	6 	avatar 	varchar(255) 	utf8mb4_unicode_ci 		Yes 	NULL 			Change Change 	Drop Drop

    More More

	7 	provider 	varchar(20) 	utf8mb4_unicode_ci 		Yes 	NULL 			Change Change 	Drop Drop

    More More

	8 	provider_id 	varchar(255) 	utf8mb4_unicode_ci 		Yes 	NULL 			Change Change 	Drop Drop

    More More

	9 	access_token 	varchar(255) 	utf8mb4_unicode_ci 		Yes 	NULL 			Change Change 	Drop Drop

    More More

	10 	type 	int 			No 	2 			Change Change 	Drop Drop

    More More

	11 	street 	varchar(255) 	utf8mb4_unicode_ci 		Yes 	NULL 			Change Change 	Drop Drop

    More More

	12 	house_flat 	varchar(255) 	utf8mb4_unicode_ci 		Yes 	NULL 			Change Change 	Drop Drop

    More More

	13 	post_index 	varchar(255) 	utf8mb4_unicode_ci 		Yes 	NULL 			Change Change 	Drop Drop

    More More

	14 	city 	varchar(255) 	utf8mb4_unicode_ci 		Yes 	NULL 			Change Change 	Drop Drop

    More More

	15 	phone_number 	varchar(255) 	utf8mb4_unicode_ci 		Yes 	NULL 			Change Change 	Drop Drop

    More More

	16 	facebook_id 	varchar(255) 	utf8mb4_unicode_ci 		Yes 	NULL 			Change Change 	Drop Drop

    More More

	17 	google_id 	varchar(255) 	utf8mb4_unicode_ci 		Yes 	NULL 			Change Change 	Drop Drop

    More More

	18 	twitter_id 	varchar(255) 	utf8mb4_unicode_ci 		Yes 	NULL 			Change Change 	Drop Drop

    More More

	19 	remember_token 	varchar(100) 	utf8mb4_unicode_ci 		Yes 	NULL 			Change Change 	Drop Drop

    More More

	20 	created_at 	timestamp 			Yes 	NULL 			Change Change 	Drop Drop

    More More

	21 	updated_at --}}
