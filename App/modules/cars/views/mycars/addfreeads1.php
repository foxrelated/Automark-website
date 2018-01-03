<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
  <title>Ad Page</title>
  <link rel="stylesheet" href="<?php echo $path['template'];?>lib/css/bootstrap.css" />
  <link rel="stylesheet" href="<?php echo $path['template'];?>lib/css/font-awesome.min.css" />
  <link rel="stylesheet" href="<?php echo $path['template'];?>lib/css/hover.css" />
  <link rel="stylesheet" href="<?php echo $path['template'];?>lib/css/magnific-popup.css" />
  <link rel="stylesheet" href="<?php echo $path['template'];?>lib/css/lightslider.css" />
  <link rel="stylesheet" href="<?php echo $path['template'];?>lib/css/style-Ads.css" />

</head>
<body>

    <!-- Add New Ads -->

<section dir="rtl" class="add-ad">
  <div class="container">
    <h2>أضف اعلانك مجانا</h2>
    <div dir="rtl" class="bar">
      <button class="btn btn-secondary col-lg-2">سيارة</button>
      <button class="motor btn btn-secondary col-lg-2">دراجة</button>
      <button class="heavy btn btn-secondary col-lg-2">شاحنة</button>
      <button class="boat btn btn-secondary active col-lg-2">قارب</button>
      <button class="btn btn-secondary col-lg-2">رقم جوال</button>
      <button class="btn btn-secondary col-lg-2">رقم سيارة</button>
    </div>
    <form class="form">
    <div class="form-group">
      <input class="car-type-input col-lg-12 col-md-12 col-sm-12 col-xs-12" type="text" placeholder="أضف عنوان الإعلان (40 حرف)" maxlength="40" />
      <input class="price-input col-lg-12 col-md-12 col-sm-12 col-xs-12" type="text" placeholder="السعر المطلوب (درهم)" />
    </div>
    <div class="form-group form-row">
      <input class="detail-make-input col-lg-6" type="text" placeholder="سنة التصنيع" />
      <input class="detail-km-input col-lg-6" type="text" placeholder="الكيلومتر الحالي"   />
    </div>
    <div class="form-group form-row">
      <input class="detail-phone-input col-lg-6" type="text" placeholder="رقم موبايل البائع" />
      <input class="detail-place-input col-lg-6" type="text" placeholder="مكان البائع" />
    </div>
    </form>
  </div>
</section>

  <!-- Car Details -->
    <section class="car-detail">
      <div class="container">
        <div class="car-image-head">
          <p class="car-type inline">أضف عنوان الاعلان</p>
          <p class="price inline hvr-bob"><span class="num-bd">00,000</span> درهم</p>
          <small class="text-muted">04:23am | 12 Oct, 2017</small>
          <div class="basic-details">
            <ul class="list-inline">
              <li class="detail col-md-3 hvr-bob"><i class="fa fa-dashboard"></i><span class="detail-km num-bd">95,000</span> كيلومتر</li>
              <li class="detail col-md-3 hvr-bob"><i class="fa fa-calendar fa-1"></i><span class="detail-make num-bd">2012</span></li>
              <li class="detail detail-place col-md-3 hvr-bob"><i class="fa fa-map-marker"></i>القوز | دبي</li>
              <li dir="ltr" class="detail detail-phone num-bd col-md-3 hvr-bob">050 123 1234<i class="fa fa-mobile"></i></li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <div class="car-images">
      <div class="container">
        <ul id="vertical" class="list-unstyled">
          <li data-thumb="img/Rectangle47.png">
            <img class="clicko img-responsive" src="img/PrimaryPhoto.png" />
          </li>
          <li data-thumb="img/Rectangle47.png">
            <img class="img-responsive" src="img/Rectangle47.png" />
          </li>
        </ul>
      </div>
    </div>

  <!-- Information -->
<span>
  <section class="information" id="boat">
    <div class="container">
      <h2>المعلومات الرئيسية</h2>
      <div class="half-info col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <div class="symbol-container">
        <select class="custom-select d-block my-3">
          <option value="0">نوع الوقود</option>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <div class="symbol-container">
        <select class="custom-select d-block my-3">
          <option value="0">كم الحمولة</option>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <div class="symbol-container">
        <select class="custom-select d-block my-3">
          <option value="0">قوة المحرك</option>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <div class="symbol-container">
        <select class="custom-select d-block my-3">
          <option value="0">سرعة المحرك</option>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <div class="symbol-container">
        <select class="custom-select d-block my-3">
          <option value="0">طول القارب</option>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <div class="symbol-container">
        <select class="custom-select d-block my-3">
          <option value="0">حالة القارب</option>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
      </div>
      <div class="half-info col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <div class="symbol-container">
        <select class="custom-select d-block my-3">
          <option value="0">النوع</option>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <div class="symbol-container">
        <select class="custom-select d-block my-3">
          <option value="0">الموديل</option>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <div class="symbol-container">
        <select class="custom-select d-block my-3">
          <option value="0">الهيئة</option>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <div class="symbol-container">
        <select class="custom-select d-block my-3">
          <option value="0">اللون</option>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <div class="symbol-container">
        <select class="custom-select d-block my-3">
          <option value="0">عام التصنيع</option>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <div class="symbol-container">
        <select class="custom-select d-block my-3">
          <option value="0">عدد الكيلومترات المستهلكة</option>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
      </div>
      <textarea class="col-lg-12" maxlength="150">معلومات إضافية(150 حرف)</textarea>
    </div>
  </section>

  <section class="information" id="motor">
    <div class="container">
      <h2>المعلومات الرئيسية</h2>
      <div class="half-info col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <div class="symbol-container">
        <select class="custom-select d-block my-3">
          <option value="0">عدد الكيلومترات المستهلكة</option>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <div class="symbol-container">
        <select class="custom-select d-block my-3">
          <option value="0">نوع الوقود</option>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <div class="symbol-container">
        <select class="custom-select d-block my-3">
          <option value="0">قوة الموتور</option>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <div class="symbol-container">
        <select class="custom-select d-block my-3">
          <option value="0">عدد السلندرات</option>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <div class="symbol-container">
        <select class="custom-select d-block my-3">
          <option value="0">حالة الدراجة</option>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
      </div>
      <div class="half-info col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <div class="symbol-container">
        <select class="custom-select d-block my-3">
          <option value="0">النوع</option>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <div class="symbol-container">
        <select class="custom-select d-block my-3">
          <option value="0">الموديل</option>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <div class="symbol-container">
        <select class="custom-select d-block my-3">
          <option value="0">الهيئة</option>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <div class="symbol-container">
        <select class="custom-select d-block my-3">
          <option value="0">اللون</option>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <div class="symbol-container">
        <select class="custom-select d-block my-3">
          <option value="0">سنة الصنع</option>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
      </div>
      <textarea class="col-lg-12" maxlength="150">معلومات إضافية (150 حرف)</textarea>
    </div>
  </section>

  <section class="information" id="heavy">
    <div class="container">
      <h2>المعلومات الرئيسية</h2>
      <div class="half-info col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <div class="symbol-container">
        <select class="custom-select d-block my-3">
          <option value="0">نوع الوقود</option>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <div class="symbol-container">
        <select class="custom-select d-block my-3">
          <option value="0">كم الحمولة</option>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <div class="symbol-container">
        <select class="custom-select d-block my-3">
          <option value="0">قوة الموتور</option>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <div class="symbol-container">
        <select class="custom-select d-block my-3">
          <option value="0">عدد السلندرات</option>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <div class="symbol-container">
        <select class="custom-select d-block my-3">
          <option value="0">نوع ناقل الحركة</option>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <div class="symbol-container">
        <select class="custom-select d-block my-3">
          <option value="0">حالة الشاحنة</option>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
      </div>
      <div class="half-info col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <div class="symbol-container">
        <select class="custom-select d-block my-3">
          <option value="0">النوع</option>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <div class="symbol-container">
        <select class="custom-select d-block my-3">
          <option value="0">الموديل</option>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <div class="symbol-container">
        <select class="custom-select d-block my-3">
          <option value="0">الهيئة</option>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <div class="symbol-container">
        <select class="custom-select d-block my-3">
          <option value="0">اللون</option>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <div class="symbol-container">
        <select class="custom-select d-block my-3">
          <option value="0">عام التصنيع</option>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <div class="symbol-container">
        <select class="custom-select d-block my-3">
          <option value="0">عدد الكيلومترات المستهلكة</option>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
      </div>
      <textarea class="col-lg-12" maxlength="150">معلومات إضافية(150 حرف)</textarea>
    </div>
  </section>
</span>
  <!-- Publish -->

  <section class="publish">
    <div class="container">
      <div>
      <button class="btn btn1 col-lg-6">أنشر الاعلان</button>
      <button class="btn btn2 col-lg-6">عرض الإعلان</button>
      </div>
    </div>
  </section>

  <!-- Advertise -->

  <section class="ads">
    <div class="container">
      <div class="ads1">
        <img src="img/Layer24.png" class="img-fluid  col-xs-12 col-md-12" />
        <div>
          <h4>إعلانك المميز ضعه هنا ليشاهده الجميع</h4>
          <p>سعر خاص بمناسبة شهر رمضان المبارك</p>
          <h5><i class="fa fa-star fa-lg"></i>إعلان مميز</h5>
          <img src="img/Layer21.png" class="img-fluid ads-logo" />
        </div>
      </div>
      <div class="ads2">
        <img src="img/Layer37.png" class="img-fluid col-xs-6 col-md-6" />
        <h4>مساحة إعلانية</h4>
      </div>
      <div class="ads3">
        <img src="img/Layer36.png" class="img-fluid col-xs-6 col-md-6" />
        <h4>مساحة إعلانية</h4>
      </div>
    </div>
  </section>
<!-- Scripts -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.magnific-popup.js"></script>
<script src="js/lightslider.js"></script>
<script src="js/jquery.nicescroll.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
