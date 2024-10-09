<div class="back-to-top-wrapper">
   <button id="back_to_top" type="button" class="back-to-top">
      <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
         <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
      </svg>
   </button>
</div>

<style>
   .back-to-top {
      position: fixed;
      bottom: -60px;
      right: 20px;
      background-color: #175cff;
      color: white;
      padding: 10px 15px;
      border-radius: 5px;
      text-align: center;
      text-decoration: none;
      font-size: 16px;
      opacity: 0;
      transition: all 0.4s ease;
      z-index: 1000;
      border: none;
      outline: none;
   }

   .back-to-top.show {
      bottom: 20px;
      opacity: 1;
   }
</style>

<script>
   const backToTopBtn = document.getElementById('back_to_top');

   window.onscroll = function() {
      toggleBackToTopButton();
   };

   function toggleBackToTopButton() {
      if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
         backToTopBtn.classList.add('show');
      } else {
         backToTopBtn.classList.remove('show');
      }
   }

   backToTopBtn.addEventListener('click', function(e) {
      e.preventDefault();
      window.scrollTo({
         top: 0,
         behavior: 'smooth'
      });
   });
</script>