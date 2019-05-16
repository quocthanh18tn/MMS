<!DOCTYPE html>
<html>
<head>
  <title>MMS-HAI NAM AUTOMATION</title>

  <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <base href="{{asset('')}}" >

  <link rel="stylesheet" href="mms/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="mms/w3.css">
  <link rel="stylesheet" href="mms/font-awesome.css">
  @yield('css')
  
  <script src="mms/jquery-3.1.1.min.js"></script>
  <script src="mms/popper.min.js"></script>
  <script src="mms/bootstrap/js/bootstrap.min.js"></script>
  <script src="mms/sweetalert.min.js"></script>

  <style type="text/css">

  .fakeimg1 {
      height: 115px;
      color:black;
      padding: 15px;
  }
  .carousel-inner img {
      width: 100%;
      height: 100%;
  }

  .p1 {
            font-weight: bold;
            text-align: center;
          }

  #lib-thanh{
   text-decoration: none;font-size: 15px;padding: 14px;
  }
  #lib-thanh-logout{
   text-decoration: none;font-size: 15px;padding: 14px;float: right;
  }
  #lib-thanh-active{
   text-decoration: none;font-size: 15px;padding: 14px;
  }

h1{
  text-align: center;
  font-weight: bold;
}

body{
      background-color: #ceecf5;
              }
                .pagination {
     display: inline-block;
     padding-left: 0;
     margin: 20px 0;
     border-radius: 4px;
    }
    .pagination > li {
      display: inline;
    }
    .pagination > li > a,
    .pagination > li > span {
      position: relative;
      float: left;
      padding: 6px 12px;
      margin-left: -1px;
      line-height: 1.42857143;
      color: #337ab7;
      text-decoration: none;
      background-color: #fff;
      border: 1px solid #ddd;
    }
    .pagination > li:first-child > a,
    .pagination > li:first-child > span {
      margin-left: 0;
      border-top-left-radius: 4px;
      border-bottom-left-radius: 4px;
    }
    .pagination > li:last-child > a,
    .pagination > li:last-child > span {
      border-top-right-radius: 4px;
      border-bottom-right-radius: 4px;
    }
    .pagination > li > a:hover,
    .pagination > li > span:hover,
    .pagination > li > a:focus,
    .pagination > li > span:focus {
      z-index: 2;
      color: #23527c;
      background-color: #eee;
      border-color: #ddd;
    }
    .pagination > .active > a,
    .pagination > .active > span,
    .pagination > .active > a:hover,
    .pagination > .active > span:hover,
    .pagination > .active > a:focus,
    .pagination > .active > span:focus {
      z-index: 3;
      color: #fff;
      cursor: default;
      background-color: #337ab7;
      border-color: #337ab7;
    }
    .pagination > .disabled > span,
    .pagination > .disabled > span:hover,
    .pagination > .disabled > span:focus,
    .pagination > .disabled > a,
    .pagination > .disabled > a:hover,
    .pagination > .disabled > a:focus {
      color: #777;
      cursor: not-allowed;
      background-color: #fff;
      border-color: #ddd;
    }
    .pagination-lg > li > a,
    .pagination-lg > li > span {
      padding: 10px 16px;
      font-size: 18px;
      line-height: 1.3333333;
    }
    .pagination-lg > li:first-child > a,
    .pagination-lg > li:first-child > span {
      border-top-left-radius: 6px;
      border-bottom-left-radius: 6px;
    }
    .pagination-lg > li:last-child > a,
    .pagination-lg > li:last-child > span {
      border-top-right-radius: 6px;
      border-bottom-right-radius: 6px;
    }
    .pagination-sm > li > a,
    .pagination-sm > li > span {
      padding: 5px 10px;
      font-size: 12px;
      line-height: 1.5;
    }
    .pagination-sm > li:first-child > a,
    .pagination-sm > li:first-child > span {
      border-top-left-radius: 3px;
      border-bottom-left-radius: 3px;
    }
    .pagination-sm > li:last-child > a,
    .pagination-sm > li:last-child > span {
      border-top-right-radius: 3px;
      border-bottom-right-radius: 3px;
    }
</style>
</head>

<body>

	@yield('content')


	@yield('script')
	

</body>
</html>