<div id="loading">
    <div id="loading-center">
       <div id="loading-center-absolute">
         <div id="preloader" class="bg-light-subtle">
            <div class="row">
               <div class="preloader-wrap" style="flex-direction: column;display: flex;align-items: center;">
                     <img src="template/img/favicon.png" alt="" class="img-fluid preloader-icon">
                     <div class="loading-bar"></div>
               </div>
               <h3 class="tp-preloader-title" style="margin-top: 13px;">{{ config('app.name', 'Untitled') }}</h3>
               <p class="tp-preloader-subtitle">{{ __('names.loading') }}</p>
            </div>
         </div>
       </div>
    </div>  
 </div>