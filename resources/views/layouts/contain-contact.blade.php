<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <link rel="icon" href="{{ asset('./img/logo_2.png') }}" type="">
  <link rel="stylesheet" href="{{ asset('vendors/bootstrap/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/fontawesome/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/themify-icons/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/linericon/style.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/magnefic-popup/magnific-popup.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <style>
  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #2d2d2d;
    background-color: #fdfaf6;
}

/* البانر */
.contact-banner-area {
    height: 450px;
    background: linear-gradient(rgba(30, 20, 10, 0.7), rgba(30, 20, 10, 0.7)),
                url("../img/home/12.jpg") center/cover no-repeat;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    position: relative;
    z-index: 1;
    border-radius: 0 0 20px 20px;
}

.contact-banner h1 {
    font-size: 3.5rem;
    font-weight: 700;
    color: #fff;
    text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.4);
}

/* معلومات التواصل */
.contact-info {
    margin-bottom: 30px;
    padding: 25px;
    background-color: #fff;
    border-radius: 12px;
    transition: all 0.3s ease;
    box-shadow: 0 10px 30px rgba(204, 167, 114, 0.1);
    border-left: 5px solid #b89b67;
    width: 100%;
    max-width: 340px;
}

.contact-info__icon {
    font-size: 30px;
    color: #b89b67;
    margin-right: 20px;
    background: rgba(204, 167, 114, 0.15);
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.contact-info h3 {
    color: #1a1a1a;
    font-size: 1.4rem;
    margin-bottom: 10px;
}

.contact-info p, .contact-info a {
    color: #5c5c5c;
    font-size: 1rem;
}

/* النموذج */
.contact_form {
    background-color: #fff;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    border-top: 4px solid #b89b67;
}

.contact_form .form-control {
    height: 55px;
    border: 1px solid #ddd;
    border-radius: 6px;
    margin-bottom: 25px;
    padding: 15px 20px;
    font-size: 1rem;
    transition: 0.3s;
}

.contact_form .form-control:focus {
    border-color: #b89b67;
    box-shadow: 0 0 5px rgba(204, 167, 114, 0.3);
}

.contact_form textarea.form-control {
    min-height: 160px;
    resize: vertical;
}

/* زر الإرسال */
.button-contact {
    background-color: #b89b67;
    color: #fff;
    border: none;
    padding: 15px 35px;
    font-size: 1rem;
    font-weight: 600;
    border-radius: 6px;
    cursor: pointer;
    transition: 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.button-contact:hover {
    background-color: #3a2f21;
    transform: translateY(-3px);
}

/* الخريطة */
.google-map {
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.07);
    margin-bottom: 40px;
    height: 400px;
    border: 8px solid #fff;
}

/* العنوان */
.section-title {
    position: relative;
    margin-bottom: 40px;
    padding-bottom: 15px;
    color: #2d2d2d;
    font-weight: bold;
    font-size: 1.7rem;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 60px;
    height: 3px;
    background: #b89b67;
}

/* ميديا */
@media (max-width: 767px) {
    .contact-banner-area {
        height: 350px;
    }

    .contact-banner h1 {
        font-size: 2.3rem
    }}
</style>
  
</head>
<body>
  <!-- Header Section -->
 @include('layouts.header')

  <!-- Main Content -->
  <main>
    @yield('content')
    @yield('content1')
</main>

    @include('layouts.footer')

 

  <!-- Footer Section -->
 

  <!-- Scripts -->
  @include("layouts.bottom")
</body>
</html>