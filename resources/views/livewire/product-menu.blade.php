<div>
    <div class="rounded-3xl border-2 border-gray-200 p-4 lg:p-8 grid grid-cols-12 mb-8 max-lg:max-w-lg max-lg:mx-auto gap-y-4 ">
        <div class="col-span-12 lg:col-span-2 img box flex items-start justify-center">
            <img src="{{ Storage::url('public/'.$productImage); }}" 
                alt="" 
                class="max-lg:w-full lg:w-[180px] rounded-2xl">
        </div>
        <div class="col-span-12 lg:col-span-10 detail w-full lg:pl-3">
            <div class="flex items-center justify-between w-full mb-6">
                <h5 class="font-manrope font-bold text-2xl leading-9 text-gray-900">{{ $productName }}</h5>               
            </div>
            <p class="font-normal text-base leading-7 text-gray-500 mb-6"><?php echo $obs; ?></p>
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-4 mt-4">
                    <button  price-id="price-{{ $id }}" input-id="quantity-{{ $id }}" class="sub-product group rounded-[50px] border border-gray-200 shadow-sm shadow-transparent p-2.5 flex items-center justify-center bg-white transition-all duration-500 hover:shadow-gray-200 hover:bg-gray-50 hover:border-gray-300 focus-within:outline-gray-300">
                        <svg class="stroke-gray-900 transition-all duration-500 group-hover:stroke-black" width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.5 9.5H13.5" stroke="" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <input type="text" id="quantity-{{ $id }}" class="border border-gray-200 rounded-full w-10 aspect-square outline-none text-gray-900 font-semibold text-sm py-1.5 px-3 bg-gray-100  text-center" value="0">
                    <button price-id="price-{{ $id }}" input-id="quantity-{{ $id }}" class="add-product group rounded-[50px] border border-gray-200 shadow-sm shadow-transparent p-2.5 flex items-center justify-center bg-white transition-all duration-500 hover:shadow-gray-200 hover:bg-gray-50 hover:border-gray-300 focus-within:outline-gray-300">
                        <svg class="stroke-gray-900 transition-all duration-500 group-hover:stroke-black" width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.75 9.5H14.25M9 14.75V4.25" stroke="" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
                <h6 class="text-indigo-600 font-manrope font-bold text-2xl leading-9 text-right">R$ <span id="price-{{ $id }}">{{ $price }}</span></h6>
            </div>
        </div>
    </div>
</div>