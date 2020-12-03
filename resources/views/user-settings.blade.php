@extends('layouts.app')

@section('content')
    <div>
     <h1 class="text-3xl text-gray-800 font-sans">Instellingen</h1>

     <settings-user inline-template :user="{{ json_encode($user) }}" formaction="{{  action('UserSettingsController@update', $user->id)  }}">
        <form class="w-full max-w-lg mt-6" @submit.prevent="submit">
            <div class="flex flex-wrap">

                <div class="w-full flex mb-2">
                    <div class="w-1/2">
                        <label class="text-gray-800 font-bold" for="name">Naam</label>
                    </div>
                    <div class="w-1/2">
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="name" v-model="fields.name" type="text" placeholder="Name">
                        <div v-if="errors && errors.name" class="text-red-500">@{{ errors.name[0] }}</div>
                    </div>
                </div>
{{-- 
                <div class="w-full flex mb-2">
                    <div class="w-1/2">
                        <label class="text-gray-800 font-bold" for="description">Omschrijving</label>
                    </div>
                    <div class="w-1/2">
                        <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="description" v-model="fields.description"  type="text" placeholder="Description"></textarea>
                        <div v-if="errors && errors.description" class="text-red-500">@{{ errors.description[0] }}</div>

                    </div>
                </div> --}}

{{-- 
                <div class="w-full flex mb-2">
                        <div class="w-1/2">
                            <label class="text-gray-800 font-bold" for="address">Adres</label>
                        </div>
                        <div class="w-1/2">
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="address" v-model="fields.address"  type="text" placeholder="Adres">
                            <div v-if="errors && errors.address" class="text-red-500">@{{ errors.address[0] }}</div>

                        </div>
                </div>



                <div class="w-full flex mb-2">
                        <div class="w-1/2">
                            <label class="text-gray-800 font-bold" for="postalcode">Postcode / Plaats</label>
                        </div>
                        <div class="w-1/2 flex -mx-3 ">
                            <div class="w-1/2 px-3">
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="zipcode" v-model="fields.zipcode"  type="text" placeholder="Zipcode">
                                <div v-if="errors && errors.postalcode" class="text-red-500">@{{ errors.zipcode[0] }}</div>

                            </div>
                            <div class="w-1/2 px-3">
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="place" v-model="fields.place"  type="text" placeholder="Plaats">
                                <div v-if="errors && errors.place" class="text-red-500">@{{ errors.place[0] }}</div>

                            </div>
                        </div>
                </div> --}}



                <div class="w-full flex mb-2">
                        <div class="w-1/2">
                            <label class="text-gray-800 font-bold" for="e-mail">E-mail</label>
                        </div>
                        <div class="w-1/2">
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="email" v-model="fields.email"  type="text" placeholder="E-mail">
                            <div v-if="errors && errors.email" class="text-red-500">@{{ errors.email[0] }}</div>

                        </div>
                </div>

                {{-- <div class="w-full flex mb-2">
                        <div class="w-1/2">
                            <label class="text-gray-800 font-bold" for="e-mail">Website</label>
                        </div>
                        <div class="w-1/2">
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="website" v-model="fields.website"  type="text" placeholder="Website">
                            <div v-if="errors && errors.email" class="text-red-500">@{{ errors.website[0] }}</div>

                        </div>
                </div>

                <div class="w-full flex mb-2">
                        <div class="w-1/2">
                            <label class="text-gray-800 font-bold" for="phone">Telefoon nummer</label>
                        </div>
                        <div class="w-1/2">
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="phone" v-model="fields.phone"  type="text" placeholder="Phone">
                            <div v-if="errors && errors.phone" class="text-red-500">@{{ errors.phone[0] }}</div>

                        </div>
                </div>
             --}}

                <div class="w-full flex mb-2">
                        <div class="w-1/2"></div>

                        <div class="w-1/2 flex">
                            <div class="w-1/2">
                            <p class="text-sm text-gray-500">Hier volgt nog wat extra info.</p>
                            </div>

                            <div class="w-1/2">
                                <button 
                                v-bind:class="['btn', (success ? 'bg-green-500' : 'bg-blue-500'), (processing ? 'opacity-50' : '')]"
                                
                                
                                
                                class="w-full text-white hover:bg-blue-200  py-4 px-8 rounded" type="submit">
                                    Opslaan
                                </button>
                            </div>
                        </div>
                </div>
            
                


            </div>
        </form>
     </settings-user>
    </div>

@endsection