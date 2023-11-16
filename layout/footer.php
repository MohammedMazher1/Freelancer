</main>

  <footer class="w-100 p-5 d-flex flex-column gap-5">
    <section class="row footer-content my-5">
      <div class="col text-center">
        <div class="logo">
          <h4>شعار</h4>
        </div>
      </div>
      <div class="col text-center">
        <h4>التصنيفات</h4>
        <ul class="m-0 p-0 gap-2 list-unstyled text-center">
          <li><a href="#">برمجة</a></li>
          <li><a href="#">جرافيك</a></li>
          <li><a href="#">تأليف</a></li>
          <li><a href="#">تدريس</a></li>
          <li><a href="#">رسم</a></li>
          <li><a href="#">تدريب</a></li>
        </ul>
      </div>
      <div class="col text-center">
        <h4> الخدمات</h4>
        <ul class="m-0 p-0 gap-2 list-unstyled">
          <li><a href="#">الأقسام</a></li>
          <li><a href="#">العروض</a></li>
          <li><a href="#">الأكثر طلب</a></li>
          <li><a href="#">تدريس</a></li>
          <li><a href="#">رسم</a></li>
          <li><a href="#">تدريب</a></li>
        </ul>
      </div>
      <div class="col text-center">
        <h4> المشاريع</h4>
        <ul class="m-0 p-0 gap-2 list-unstyled text-center">
          <li><a href="#">الأقسام</a></li>
          <li><a href="#">مشاريع مفتوحة</a></li>
          <li><a href="#">التقييمات</a></li>
          <li><a href="#">تدريس</a></li>
          <li><a href="#">رسم</a></li>
          <li><a href="#">تدريب</a></li>
        </ul>
      </div>
      <div class="col text-center">
        <h4>روابط هامة</h4>
        <ul class="m-0 p-0 gap-4 list-unstyled text-center">
          <li><a href="#">أعلى التصنيفات</a></li>
          <li><a href="#">الأكثر طلبا</a></li>
          <li><a href="#">مستقل الشهر</a></li>
          <li><a href="#">خدمات متزايدة</a></li>
          <li><a href="#">قصص ملهمة</a></li>
          <li><a href="#">أخر الأخبار</a></li>
        </ul>
      </div>
    </section>
    <section class="leave-message">
      <div class="row justify-content-center">
        <hr class="footer-divider">
        <div class="col-7">
          <h3 class="text-center my-4">أترك لنا رسالة</h3>
          <form>
            <input class="rounded d-block w-100 my-3 p-2" type="email" placeholder="أدخل أيميلك">
            <textarea rows="7" class="rounded d-block w-100 my-3  p-2" placeholder="رسالتك"></textarea>
            <button class="rounded w-100 py-3" type="submit">أرسـال</button>
          </form>
        </div>
      </div>
    </section>
    <section class="footer-end pt-4">
      <div class="row align-items-center flex-column">
        <div class="col-5">
          <ul class="list-unstyled d-flex gap-3 justify-content-center p-0 m-0">
            <li><a href="#"><i class="fa-brands fa-linkedin footer-icon"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-github footer-icon"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-twitter footer-icon"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-facebook footer-icon"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-instagram footer-icon"></i></a></li>    
          </ul>
        </div>
        <div class="col-12 text-center mx-1">
          <hr class="w-100 footer-divider mt-4 mb-3">
          <h6>&copy; جميع الحقوق محفوظة لشركة <span class="mkz-company"><a href="#">MKZ</a></span> للبرمجيات</h6>
        </div>
      </div>
    </section>
  </footer>


  <script src="./assets/lib/jquery-3.7.1.js"></script>
  <script src="./assets/lib/bootstrap.bundle.min.js"></script>
  <script src="./assets/js/main.js"></script>
  <script>
    // $('.loginDiv:last-child').addClass('active')
    $('#login').on('click',function(){
        $('.loginDiv .login-box').addClass('active',500)
        // $('.loginDiv:last-child').fadeIn()
        $('.loginDiv .registere-box').removeClass('active',500)
    })

    $('#register').on('click',function(){
        $('.loginDiv .registere-box').addClass('active')
        // $('.loginDiv:last-child').fadeIn()
        $('.loginDiv .login-box').removeClass('active')
    })

</script>
</body>

</html>