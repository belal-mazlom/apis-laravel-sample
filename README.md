
<h1 align="center">
    APIs Laravel Sample
</h1>

## About this sample

Just some methods to compare times. APIs get two dates, return result after calculation, The project using Laravel framework.

## Installation

Clone project:<br>
`git clone git@github.com:belal-mazlom/apis-laravel-sample.git`

You need to have composer installed in your machine:

[Composer site](https://getcomposer.org/download/)


Run inside root project directory:<br/>
`composer install`


To run dev server:<br/>
`php artisan serve --port 8080`

Open in browser: http://localhost:8080/

## Parameters
#### All APIs have same paramters: <br>
- `date1`  (required) standard date format like `2020-10-30` or `2020-06-22T10:40:25`
- `date2` (required)
- `tz1` (optional)
- `tz2` (optional)
- `unit` (optional)

<b>Notes</b>: <br>
- `tz1` and `tz2` if not provided the default value will be `UTC`
- Timezone and Timezone abbrivation accepted like `Asia/Amman` or `EEST`
- Units available: `seconds`, `minutes`, `hours`, `days`, `years`


## APIs:
### 1- Get total days between two dates:<br>
<b>URL:</b><br>
```/api/time/total-days?date1=[DateValue]&date2=[DateValue]&tz1=[TimezoneValue]&tz2=[TimezoneValue]&unit=[UnitValue]```

Examples:<br>
http://localhost:8080/api/time/total-days?date1=2020-10-10&date2=2020-10-20 <br><br>
http://localhost:8080/api/time/total-days?date1=2020-10-10&date2=2020-10-29&tz1=Asia/Amman&tz2=Asia/Tokyo <br><br>
http://localhost:8080/api/time/total-days?date1=2020-10-10&date2=2020-10-29&tz1=Asia/Amman&tz2=Asia/Tokyo&unit=seconds <br>

### 2- Get total weekdays between two dates:<br>
<b>URL:</b><br>
```/api/time/total-weekdays?date1=[DateValue]&date2=[DateValue]&tz1=[TimezoneValue]&tz2=[TimezoneValue]&unit=[UnitValue]```

Examples:<br>
http://localhost:8080/api/time/total-weekdays?date1=2020-10-10&date2=2020-10-20 <br><br>
http://localhost:8080/api/time/total-weekdays?date1=2020-10-10&date2=2020-10-29&tz1=Asia/Amman&tz2=Asia/Tokyo <br><br>
http://localhost:8080/api/time/total-weekdays?date1=2020-10-10&date2=2020-10-29&tz1=Asia/Amman&tz2=Asia/Tokyo&unit=seconds <br>

### 3- Get complete weeks between two dates:<br>
<b>URL:</b><br>
```/api/time/complete-weeks?date1=[DateValue]&date2=[DateValue]&tz1=[TimezoneValue]&tz2=[TimezoneValue]&unit=[UnitValue]```

Examples:<br>
http://localhost:8080/api/time/complete-weeks?date1=2020-10-10&date2=2020-10-20 <br><br>
http://localhost:8080/api/time/complete-weeks?date1=2020-10-10&date2=2020-10-29&tz1=Asia/Amman&tz2=Asia/Tokyo <br><br>
http://localhost:8080/api/time/complete-weeks?date1=2020-10-10&date2=2020-10-29&tz1=Asia/Amman&tz2=Asia/Tokyo&unit=seconds <br>

### Response<br>
For correct parameters: <br>
`{"status":true,"data":{"value":[number],"unit":"[SelectedUnit]"}}`

<br>

For incorrect paramters: <br>
`{"status":false,"error":"[Message error]"}`


## Stracture
Project using Laravel stracture:

```
app\
     Http\
           Controllers\
                        TimeController.php   // All routes direct to this controller
app\
    Helpers\
            FormatResponse.php   // All response formated by this class
            Time.php   // All logic of caluclation available here.
routes\
       api.php   // All routes available here.
tests\
      Feature\
              TimeTest.php   // unit test for TimeController.php
      Unit\
           FormatResponseTest.php   // unit test for FormatResponse.php
           TimeTest.php   // unit test for Time.php

```


## Laravel
- What's Laravel:
It is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## License

[MIT license](https://opensource.org/licenses/MIT).
