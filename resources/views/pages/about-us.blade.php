@extends('layouts.page')


@section('content')
        <!-- Right side -->
    <div class="flex flex-col sm:flex-row">
        <div class="w-full sm:w-2/3  p-2 text-black text-justify p-6 md:p-8 lg:p-10 sm:border-l">
            <h1 class="text-xl md:text-2xl lg:text-3xl mb-3 font-bold">بهترین کتاب را برای خواندن انتخاب کنید</h1>


            <p class="mb-3">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>



            <div class="flex flex-row rounded-lg border-2 p-3 justify-center items-center my-8">
                <div class="flex flex-col items-center p-4">
                    <h4 class="text-lg">نقدها</h4>
                    <span class="text-3xl">۹۰۲۱</span>
                </div>

                <div class="flex flex-col items-center p-4">
                    <h4 class="text-lg">کتاب‌ها</h4>
                    <span class="text-3xl">۳۴۹۸</span>
                </div>

                <div class="flex flex-col items-center p-4">
                    <h4 class="text-lg">نویسندگان</h4>
                    <span class="text-3xl">۲۰۱</span>
                </div>

                <div class="flex flex-col items-center p-4">
                    <h4 class="text-lg">ناشرین</h4>
                    <span class="text-3xl">۴۷</span>
                </div>
            </div>

        </div>
        <!-- End of right side -->

        <!-- Sidebar -->
        <div class="w-full sm:w-1/3 p-6 md:p-8 lg:p-10">
            <div class="border-b flex mb-1 pb-2">
                <div class="text-black flex items-baseline">

                    <i class="far fa-user"></i>
                    <h2 class="mr-1 font-bold">کیوسک</h2>
                </div>

            </div>

            <div class="flex flex-col">
                <a href="#" class="text-silver-800 hover:text-brown-500 my-1">تماس با ما</a>
                <a href="#" class="text-silver-800 hover:text-brown-500 my-1">درباره کیوسک</a>
                <a href="#" class="text-silver-800 hover:text-brown-500 my-1">سازندگان</a>
                <a href="#" class="text-silver-800 hover:text-brown-500 my-1">قوانین</a>
            </div>
        </div>
        <!-- End of sidebar -->
    </div>
@endsection
