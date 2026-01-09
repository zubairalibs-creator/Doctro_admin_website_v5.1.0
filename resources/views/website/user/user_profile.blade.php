@extends('layout.mainlayout',['activePage' => 'user'])

@section('css')
<style>
    .sidebar li.active {
        background: linear-gradient(45deg, #00000000 50%, #f4f2ff);
        border-left: 2px solid var(--site_color);
    }
</style>
@endsection

@section('content')
<div class="xl:w-3/4 mx-auto">
    <div class="xxsm:mx-5 xl:mx-0 2xl:mx-0 pt-10">
        <div class="flex h-full mb-20 xxsm:flex-col sm:flex-col xmd:flex-row xmd:space-x-5 ">
            <div class="2xl:w-1/5 1xl:w-1/5 xl:w-1/4 xlg:w-80 lg:w-72 xxmd:w-72 !xmd:w-72 md:w-72 h-auto">
                @include('website.user.userSidebar',['active' => 'dashboard'])
            </div>
            <div class="w-full md:w-full xxmd:w-full xmd:w-80 lg:w-2/3 xlg:w-2/3 1xl:w-full 2xl:w-full sm:ml-0 xxsm:ml-0 shadow-lg overflow-hidden p-5 mt-10 2xl:mt-0 xmd:mt-0">
                <div class="border border-white-100 overflow-hidden ">
                    <ul class="mb-5 flex list-none flex-col flex-wrap border-b-0 pl-2 md:flex-row" role="tablist" data-te-nav-ref>
                        <li role="presentation">
                            <a href="#tabs-home" class="my-2 block border-x-0 border-t-0 border-b-2 border-transparent px-7 pt-4 pb-3.5 text-xs font-semibold uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400" data-te-toggle="pill" data-te-target="#tabs-home" data-te-nav-active role="tab" aria-controls="tabs-home" aria-selected="true">{{ __('Appointments') }}</a>
                        </li>
                        <li role="presentation">
                            <a href="#tabs-profile" class="focus:border-transparen my-2 block border-x-0 border-t-0 border-b-2 border-transparent px-7 pt-4 pb-3.5 text-xs font-semibold uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400" data-te-toggle="pill" data-te-target="#tabs-profile" role="tab" aria-controls="tabs-profile" aria-selected="false">{{ __('Prescriptions') }}</a>
                        </li>
                        <li role="presentation">
                            <a href="#tabs-messages" class="my-2 block border-x-0 border-t-0 border-b-2 border-transparent px-7 pt-4 pb-3.5 text-xs font-semibold uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400" data-te-toggle="pill" data-te-target="#tabs-messages" role="tab" aria-controls="tabs-messages" aria-selected="false">{{ __('Purchased Medicine') }}</a>
                        </li>
                    </ul>
                    <div class="mb-6">
                        <div class="hidden opacity-0 opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block" id="tabs-home" role="tabpanel" aria-labelledby="tabs-home-tab" data-te-tab-active>
                            <div class="flex flex-col">
                                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="overflow-hidden table-responsive p-5">
                                            <table class="min-w-full datatable">
                                                <thead class="border-b">
                                                    <tr>
                                                        <th scope="col" class="text-sm font-semibold px-6 py-4 text-left">#</th>
                                                        <th scope="col" class="text-sm font-semibold px-6 py-4 text-left">{{__('Appointment Id') }}</th>
                                                        <th scope="col" class="text-sm font-semibold px-6 py-4 text-left">{{__('Report Image') }}</th>
                                                        <th scope="col" class="text-sm font-semibold px-6 py-4 text-left">{{__('Appointment Date') }}</th>
                                                        <th scope="col" class="text-sm font-semibold px-6 py-4 text-left">{{__('Amount') }}({{ $currency }})</th>
                                                        <th scope="col" class="text-sm font-semibold px-6 py-4 text-left">{{__('Appointment Status') }}</th>
                                                        <th scope="col" class="text-sm font-semibold px-6 py-4 text-left">{{__('Action') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($appointments as $appointment)
                                                    <tr class=" border-b transition duration-300 ease-in-out hover:bg-gray-50">
                                                        <td class="text-sm px-6 py-4">{{ $loop->iteration }}</td>
                                                        <td class="text-sm px-6 py-4">{{ $appointment->appointment_id }}</td>
                                                        <td class="text-sm px-6 py-4">
                                                            @if ($appointment->report_image != null)
                                                            @foreach ($appointment->report_image as $item)
                                                            <a href="{{ $item }}" data-fancybox="gallery2">
                                                                <img src="{{ $item }}" alt="Feature Image" class="w-12 h-12 rounded-full p-0.5 m-auto" width="42px" height="42px">
                                                            </a>
                                                            @endforeach
                                                            @else
                                                            {{__('Image Not available')}}
                                                            @endif
                                                        </td>
                                                        <td class="text-sm px-6 py-4">
                                                            <span>{{ $appointment->time }}</span>
                                                        </td>
                                                        <td class="text-sm px-6 py-4">{{ $currency }}{{ $appointment->amount }}
                                                        </td>
                                                        <td class="text-sm px-6 py-4">
                                                            @if($appointment->appointment_status == 'pending' || $appointment->appointment_status == 'PENDING')
                                                            <span class="border border-yellow-100 bg-yellow-100 px-3 py-1 text-yellow rounded-full">{{__('Pending')}}</span>
                                                            @endif
                                                            @if($appointment->appointment_status == 'approve' || $appointment->appointment_status == 'APPROVE')
                                                            <span class="border border-green-100 bg-green-100 px-3 py-1 text-green rounded-full">{{__('Approved')}}</span>
                                                            @endif
                                                            @if($appointment->appointment_status == 'cancel' || $appointment->appointment_status == 'CANCEL')
                                                            <span class="border border-red-100 bg-red-100 px-3 py-1 text-red rounded-full">{{__('Cancelled')}}</span>
                                                            @endif
                                                            @if($appointment->appointment_status == 'complete' || $appointment->appointment_status == 'COMPLETE')
                                                            <span class="border border-sky-100 bg-sky-100 px-3 py-1 text-sky rounded-full">{{__('Completed')}}</span>
                                                            @endif
                                                        </td>
                                                        <td class="text-sm px-6 py-4">
                                                            <div class="flex">
                                                                <a onclick="show_appointment({{ $appointment->id }})" class="bg-green-100 p-2 rounded-lg ml-2" href="javascript:void(0)" data-te-toggle="modal" data-te-target="#exampleModalCenter" data-te-ripple-init data-te-ripple-color="light">
                                                                    <i class="text-green fa fa-eye" aria-hidden="true"></i>
                                                                </a>
                                                                @if ($appointment->appointment_status == 'complete' || $appointment->appointment_status == 'cancel')
                                                                @if ($appointment->isReview == false)
                                                                <a onclick="appointId({{ $appointment->id }})" class="bg-yellow-100 p-2 rounded-lg ml-2" href="javascript:void(0)" data-te-toggle="modal" data-te-target="#addReview" data-te-ripple-init data-te-ripple-color="light">
                                                                    <i class="text-yellow fa fa-star" aria-hidden="true"></i>
                                                                </a>
                                                                @endif
                                                                @endif
                                                                @if ($appointment->appointment_status != 'cancel' && $appointment->appointment_status != 'complete')
                                                                <a href="#cancel_reason" onclick="appointId({{ $appointment->id }})" class="bg-red-100 py-2 px-3 rounded-lg ml-2 d-flex justify-content-between" href="javascript:void(0)" data-te-toggle="modal" data-te-target="#cancel_reason" data-te-ripple-init data-te-ripple-color="light"><i class="text-red fa-solid fa-trash-can"></i></a>
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block" id="tabs-profile" role="tabpanel" aria-labelledby="tabs-profile-tab">
                            <div class="flex flex-col">
                                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="overflow-hidden table-responsive p-5">
                                            <table class="min-w-full datatable">
                                                <thead class="bg-white-50 border-b">
                                                    <tr>
                                                        <th scope="col" class="text-sm font-semibold px-6 py-4 text-left">#</th>
                                                        <th scope="col" class="text-sm font-semibold px-6 py-4 text-left">{{__('Appointment Id') }}</th>
                                                        <th scope="col" class="text-sm font-semibold px-6 py-4 text-left">{{__('Appointment Date') }}</th>
                                                        <th scope="col" class="text-sm font-semibold px-6 py-4 text-left">{{__('Created by') }}</th>
                                                        <th scope="col" class="text-sm font-semibold px-6 py-4 text-left">{{__('Action') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($prescriptions as $prescription)
                                                    <tr class="bg-white-50 border-b transition duration-300 ease-in-out hover:bg-gray-50">
                                                        <td class="text-sm px-6 py-4">{{ $loop->iteration }}</td>
                                                        <td class="text-sm px-6 py-4">{{$prescription->appointment['appointment_id'] }}</td>
                                                        <td class="text-sm px-6 py-4">{{ Carbon\Carbon::parse($prescription->created_at)->format('d F Y') }}
                                                        </td>
                                                        <td class="text-sm px-6 py-4">
                                                            <a href="{{ url('doctor_profile/' . $prescription->doctor['id'] . '/' . Str::slug($prescription->doctor['name'])) }}" class="avatar avatar-sm mr-2">
                                                                <img class="rounded-full" src="{{ $prescription->doctor['fullImage'] }}" alt="User Image" width="50px" height="50px">
                                                            </a>
                                                            <a href="{{ url('doctor_profile/' . $prescription->doctor['id'] . '/' . Str::slug($prescription->doctor['name'])) }}">{{$prescription->doctor['name'] }}</a>
                                                        </td>
                                                        <td class="text-sm px-6 py-4">
                                                            <div class="table-action">
                                                                <div class="flex space-x-2">
                                                                    <div>
                                                                        <a href="{{ url('downloadPDF/' . $prescription->id) }}" type="button" class="justify-between px-6 pt-2.5 pb-2 bg-white-50 border-solid border-2 border-primary font-semibold text-xs leading-normal uppercase rounded transition duration-150 ease-in-out flex align-center">
                                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M2 16C1.45 16 0.979333 15.8043 0.588 15.413C0.196 15.021 0 14.55 0 14V11H2V14H14V11H16V14C16 14.55 15.8043 15.021 15.413 15.413C15.021 15.8043 14.55 16 14 16H2ZM8 12L3 7L4.4 5.55L7 8.15V0H9V8.15L11.6 5.55L13 7L8 12Z" />
                                                                            </svg>
                                                                            <span class="ml-2 text-primary">{{ __('Download') }}</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block" id="tabs-messages" role="tabpanel" aria-labelledby="tabs-profile-tab">
                            <div class="flex flex-col">
                                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="overflow-hidden table-responsive p-5">
                                            <table class="min-w-full datatable">
                                                <thead class="bg-white-50 border-b">
                                                    <tr>
                                                        <th scope="col" class="text-sm font-semibold px-6 py-4 text-left">#</th>
                                                        <th scope="col" class="text-sm font-semibold px-6 py-4 text-left">{{__('Appointment Id') }}</th>
                                                        <th scope="col" class="text-sm font-semibold px-6 py-4 text-left">{{__('Amount') }}({{ $currency }})</th>
                                                        <th scope="col" class="text-sm font-semibold px-6 py-4 text-left">{{__('Attachment') }}</th>
                                                        <th scope="col" class="text-sm font-semibold px-6 py-4 text-left">{{__('Payment type') }}</th>
                                                        <th scope="col" class="text-sm font-semibold px-6 py-4 text-left">{{__('Payment Status') }}</th>
                                                        <th scope="col" class="text-sm font-semibold px-6 py-4 text-left">{{__('Action') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($purchaseMedicines as $purchaseMedicine)
                                                    <tr class="bg-white-50 border-b transition duration-300 ease-in-out hover:bg-gray-50">
                                                        <td class="text-sm px-6 py-4">{{ $loop->iteration }}</td>
                                                        <td class="text-sm px-6 py-4">{{ $purchaseMedicine->medicine_id }}</td>
                                                        <td class="text-sm px-6 py-4">{{ $currency }}{{ $purchaseMedicine->amount }}</td>
                                                        <td class="text-sm px-6 py-4">
                                                            @if (isset($purchaseMedicine->pdf) || $purchaseMedicine->pdf != null)
                                                            <a href="{{ url('prescription/upload/' . $purchaseMedicine->pdf) }}" data-fancybox="gallery2">
                                                                {{ $purchaseMedicine->pdf }}
                                                            </a>
                                                            @else
                                                            {{ __('Not available') }}
                                                            @endif
                                                        </td>
                                                        <td class="text-sm px-6 py-4">{{ $purchaseMedicine->payment_type }}</td>
                                                        <td class="text-sm px-6 py-4">
                                                            @if ($purchaseMedicine->payment_status == 1)
                                                            <span class="btn btn-sm btn-success">{{ __('Paid') }}</span>
                                                            @else
                                                            <span class="btn btn-sm btn-danger">{{ __('Remaining') }}</span>
                                                            @endif
                                                        </td>
                                                        <td class="text-sm px-6 py-4">
                                                            <a onclick="show_medicines({{ $purchaseMedicine->id }})" class="bg-green-100 p-2 rounded-lg ml-2" href="javascript:void(0)" data-te-toggle="modal" data-te-target="#purchased_medicine" data-te-ripple-init data-te-ripple-color="light">
                                                                <i class="text-green fa fa-eye" aria-hidden="true"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
    

    <!-- Modal -->
    <div data-te-modal-init class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none " id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenter" aria-hidden="true">
        <div data-te-modal-dialog-ref class="pointer-events-none relative h-[calc(100%-1rem)] w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
            <div class="pointer-events-auto relative flex max-h-[100%] w-full flex-col overflow-hidden rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                    <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalCenter"> {{ __('Appointment Details') }}</h5>
                    <button type="button" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="relative overflow-y-auto p-4">
                    <div class="border border-white-light p-2">
                        <h5 class="font-bold text-base font-fira-sans px-2">{{ __('Hospital Details') }}</h5>
                        <table class="min-w-full">
                            <tr>
                                <td class="text-sm text-gray-600  px-2 py-2 text-left font-fira-sans">{{ __('appointment Id')}}</td>
                                <td class="text-sm font-light px-2 py-2 font-fira-sans appointment_id"></td>
                            </tr>
                            <tr>
                                <td class="text-sm text-gray-600 px-2 py-2 text-left font-fira-sans">{{ __('Hospital') }}</td>
                                <td class="text-sm font-light px-2 py-2 font-fira-sans hospital"></td>
                            </tr>
                            <tr>
                                <td class="text-sm text-gray-600 px-2 py-2 text-left font-fira-sans">{{ __('Doctor name') }}</td>
                                <td class="text-sm font-light px-2 py-2 font-fira-sans doctor_name"></td>
                            </tr>
                            <tr>
                                <td class="text-sm text-gray-600 px-2 py-2 text-left font-fira-sans">{{ __('Appointment date') }}</td>
                                <td class="text-sm font-light px-2 py-2 font-fira-sans date"></td>
                            </tr>
                            <tr>
                                <td class="text-sm text-gray-600 px-2 py-2 text-left font-fira-sans">{{ __('Appointment time') }}</td>
                                <td class="text-sm font-light px-2 py-2 font-fira-sans time"></td>
                            </tr>
                        </table>
                    </div>

                    <div class="border border-white-light p-2 mt-3">
                        <h5 class="font-bold text-base font-fira-sans px-2">{{ __('Patient Details') }}</h5>
                        <table class="min-w-full">
                            <tr>
                                <td class="w-2/4 text-sm text-gray-600 px-2 py-2 text-left font-fira-sans">{{ __('patient name') }}</td>
                                <td class="w-2/4 text-sm font-light px-2 py-2 font-fira-sans patient_name"></td>
                            </tr>
                            <tr>
                                <td class="w-2/4 text-sm text-gray-600 px-2 py-2 text-left font-fira-sans">{{ __('patient age') }}</td>
                                <td class="w-2/4 text-sm font-light px-2 py-2 font-fira-sans patient_age"></td>
                            </tr>
                            <tr>
                                <td class="w-2/4 text-sm text-gray-600 px-2 py-2 text-left font-fira-sans">{{ __('illness information') }}</td>
                                <td class="w-2/4 text-sm font-light px-2 py-2 font-fira-sans illness_info"></td>
                            </tr>
                            <tr>
                                <td class="w-2/4 text-sm text-gray-600 px-2 py-2 text-left font-fira-sans">{{ __('patient address') }}</td>
                                <td class="w-2/4 text-sm font-light px-2 py-2 font-fira-sans patient_address"></td>
                            </tr>
                        </table>
                    </div>

                    <div class="border border-white-light p-2 mt-3">
                        <h5 class="font-bold text-base font-fira-sans px-2">{{ __('Payment Details') }}</h5>
                        <table class="min-w-full">
                            <tr>
                                <td class="w-2/4 text-sm text-gray-600 px-2 py-2 text-left font-fira-sans">{{ __('Amount') }}</td>
                                <td class="w-2/4 text-sm font-light px-2 py-2 font-fira-sans amount"></td>
                            </tr>
                            <tr>
                                <td class="w-2/4 text-sm text-gray-600 px-2 py-2 text-left font-fira-sans">{{ __('Payment Status') }}</td>
                                <td class="w-2/4 text-sm font-light px-2 py-2 font-fira-sans payment_status"></td>
                            </tr>
                            <tr>
                                <td class="w-2/4 text-sm text-gray-600 px-2 py-2 text-left font-fira-sans">{{ __('Payment type') }}</td>
                                <td class="w-2/4 text-sm font-light px-2 py-2 font-fira-sans payment_type"></td>
                            </tr>
                            <tr>
                                <td class="w-2/4 text-sm text-gray-600 px-2 py-2 text-left font-fira-sans">{{ __('patient address') }}</td>
                                <td class="w-2/4 text-sm font-light px-2 py-2 font-fira-sans patient_address"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div data-te-modal-init class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none" id="addReview" tabindex="-1" aria-labelledby="addReviewLabel" aria-hidden="true">
        <div data-te-modal-dialog-ref class="pointer-events-none relative h-[calc(100%-1rem)] w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
            <div class="pointer-events-auto relative flex max-h-[100%] w-full flex-col overflow-hidden rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                    <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="addReviewLabel"> {{ __('Review') }}</h5>
                    <button type="button" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <form action="{{ url('/addReview') }}" method="post" id="reviewForm">
                    @csrf
                    <div class="relative overflow-y-auto p-4">
                        <input type="hidden" name="appointment_id" value="">
                        <label class="col-form-label font-fira-sans">{{ __('Rating') }}</label>
                        <div id="full-stars-example-two">
                            <div class="rating-group">
                                <input disabled checked class="rating__input rating__input--none" name="rate" id="rating3-none" value="0" type="radio">
                                <label aria-label="1 star" class="rating__label" for="rating3-1"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <input class="rating__input" name="rate" id="rating3-1" value="1" type="radio">
                                <label aria-label="2 stars" class="rating__label" for="rating3-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <input class="rating__input" name="rate" id="rating3-2" value="2" type="radio">
                                <label aria-label="3 stars" class="rating__label" for="rating3-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <input class="rating__input" name="rate" id="rating3-3" value="3" type="radio">
                                <label aria-label="4 stars" class="rating__label" for="rating3-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <input class="rating__input" name="rate" id="rating3-4" value="4" type="radio">
                                <label aria-label="5 stars" class="rating__label" for="rating3-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <input class="rating__input" name="rate" id="rating3-5" value="5" type="radio">
                            </div>
                            <span class="invalid-div text-danger"><span class="rate text-sm text-base text-red-600 font-fira-sans"></span></span>
                        </div>
                        <div class="mt-2">
                            <div class="mb-3 xl:w-96">
                                <label for="exampleFormControlTextarea1" class="form-label font-fira-sans inline-block mb-2 text-gray">{{ __('Write Review') }}</label>
                                <textarea name="review" class="font-fira-sans block w-full px-3 py-1.5 text-base font-normal text-gray bg-white-50 bg-clip-padding border border-solid border-white-light rounded transition ease-in-out m-0 focus:text-gray focus:bg-white-50 focus:border-primary focus:outline-none" id="exampleFormControlTextarea1" rows="3" placeholder="{{ __('Write your review') }}"></textarea>
                                <span class="invalid-div text-red"><span class="review text-sm  text-red-600 font-fira-sans"></span></span>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <button type="button" class="inline-block rounded bg-white px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200" data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                            Close
                        </button>
                        <button type="button" onclick="addReview()" class="ml-1 inline-block rounded bg-primary px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]" data-te-ripple-init data-te-ripple-color="light"> Save changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div data-te-modal-init class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none" id="purchased_medicine" tabindex="-1" aria-labelledby="purchased_medicineLabel" aria-hidden="true">
    <div data-te-modal-dialog-ref class="pointer-events-none relative h-[calc(100%-1rem)] w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
        <div class="pointer-events-auto relative flex max-h-[100%] w-full flex-col overflow-hidden rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
            <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="purchased_medicineLabel"> {{ __('Purchased medicine details') }}</h5>
                <button type="button" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="relative overflow-y-auto p-4">
                <div class="border p-2">
                    <div class="font-fira-sans px-2 text-base">{{ __('Shipping Details') }}</div>
                    <table class="min-w-full mt-3">
                        <tbody>
                            <tr>
                                <td class="text-sm text-gray-600 px-2 py-2 text-left font-fira-sans">{{__('shipping At')}}</td>
                                <td class="text-sm font-light px-2 py-2 font-fira-sans shippingAt"></td>
                            </tr>
                            <tr class="shippingAddressTr">
                                <td class="text-sm text-gray-600 px-2 py-2 text-left font-fira-sans">{{__('shipping Adddress')}}</td>
                                <td class="text-sm font-light px-2 py-2 font-fira-sans shippingAddress"></td>
                            </tr>
                            <tr class="shippingAddressTr">
                                <td class="text-sm font-light px-2 py-2 font-fira-sans">{{__('Delivery Charge')}}</td>
                                <td class="text-sm font-light px-2 py-2 font-fira-sans deliveryCharge"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="border p-2 mt-3">
                    <div class="font-fira-sans text-right">{{ __('Medicine Details') }}</div>
                    <table class="min-w-full mt-2">
                        <thead class="bg-[#f4fbfd]">
                            <th class="text-sm font-light px-2 py-2 font-fira-sans">{{__('Medicine name')}}</th>
                            <th class="text-sm font-light px-2 py-2 font-fira-sans">{{__('Medicine qty')}}</th>
                            <th class="text-sm font-light px-2 py-2 font-fira-sans">{{__('Medicine price')}}</th>
                        </thead>
                        <tbody class="tbody">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div data-te-modal-init class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none" id="cancel_reason" tabindex="-1" aria-labelledby="cancel_reasonLabel" aria-hidden="true">
    <div data-te-modal-dialog-ref class="pointer-events-none relative h-[calc(100%-1rem)] w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
        <div class="pointer-events-auto relative flex max-h-[100%] w-full flex-col overflow-hidden rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
            <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="cancel_reasonLabel"> {{ __('Appointment Cancel') }}</h5>
                <button type="button" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="relative overflow-y-auto p-4">
                <form method="post" id="cancelForm">
                    @csrf
                    <input type="hidden" name="id" value="">
                    <input type="hidden" name="cancel_by" value="user">
                    <table class="table">
                        @foreach (json_decode($cancel_reason) as $cancel_reason)
                        <tr>
                            <td>
                                <div class="relative flex items-center my-1 mt-2">
                                    <input type="radio" class="d-none custom_radio" id="cod{{$loop->iteration}}" name="payment" onchange="seeData('#codPayment')" checked>
                                    <label for="cod{{$loop->iteration}}" class="absolute custom-radio"></label>
                                    <label for="cod{{$loop->iteration}}" class="ms-4 normal-label">{{$cancel_reason}}</label>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>
            </div>
            <div class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <button type="button" class="inline-block rounded bg-white px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200" data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                    Close
                </button>
                <button type="submit" class="ml-1 inline-block rounded bg-primary px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]" onclick="cancelAppointment()" data-te-ripple-init data-te-ripple-color="light"> Save changes
                </button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="{{url('assets/js/custom.js')}}"></script>
@endsection