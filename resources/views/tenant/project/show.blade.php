@extends('layouts.app')

@section('content')

   
    <div class="w-1/3 inline-block float-left">
        <h1 class="text-3xl text-gray-500 font-sans">{{ $project->name}}</h1>
        <project inline-template :project="{{ json_encode($project) }}" formaction="{{  action('ProjectController@update', $project->id)  }}">
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
    
                            <div class="w-full flex mb-2">
                                <div class="w-1/2">
                                    <label class="text-gray-800 font-bold" for="description">Omschrijving</label>
                                </div>
                                <div class="w-1/2">
                                    <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="description" v-model="fields.description"  type="text" placeholder="Description"></textarea>
                                    <div v-if="errors && errors.description" class="text-red-500">@{{ errors.description[0] }}</div>

                                </div>
                            </div>
        
   
    

            
                            <div class="w-full flex mb-2">
                                    <div class="w-1/2">
                                        <label class="text-gray-800 font-bold" for="deadline">Deadline</label>
                                    </div>
                                    <div class="w-1/2">
                                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="deadline" v-model="fields.deadline"  type="date" placeholder="Deadline">
                                        <div v-if="errors && errors.deadline" class="text-red-500">@{{ errors.deadline[0] }}</div>

                                    </div>
                            </div>


                            <div class="w-full flex mb-2">
                                    <div class="w-1/2">
                                        <label class="text-gray-800 font-bold" for="phone">Organisation</label>
                                    </div>
                                    <div class="w-1/2">
                                        <div class="relative">
                                                <select 
                                                id="organisation_id" v-model="fields.organisation_id"
                                                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                                  
                                                @foreach ($organisations as $organisation)
                                                    <option value="{{$organisation->id}}">{{$organisation->name}}</option>
                                                @endforeach
                                                </select>
                                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                                </div>
                                              </div>
                                        <div v-if="errors && errors.phone" class="text-red-500">@{{ errors.phone[0] }}</div>

                                    </div>
                            </div>
                          
    
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
                                                Save
                                            </button>
                                        </div>
                                    </div>
                            </div>
                          
                            
    
    
                        </div>
                      </form>
        
        </project> 

           

    </div>

    <div class="w-1/3 inline-block float-right h-56">
        <h1 class="text-3xl w-full text-gray-500 font-sans">Tasks</h1>
        <div class="w-full mt-6">
            <task-create inline-template formaction="{{  action('TaskController@submit', $project->id)  }}">
                <div>
                    <form class="w-full max-w-lg mt-6" @submit.prevent="submit">
                        <div class="flex w-full">
                            <div class="flex-1 inline-block float-left flex">
                                <input class="appearance-none block w-full border-r-0 rounded-r-none text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="name" v-model="fields.name" type="text" placeholder="Title">
                                <div v-if="errors && errors.name" class="text-red-500">@{{ errors.name[0] }}</div>
                            </div>

                            <div class="w-16 flex inline-block float-left">
                                <input class="appearance-none block w-full rounded-l-none text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="deadline" v-model="fields.deadline"  type="date" placeholder="Deadline">
                                <div v-if="errors && errors.deadline" class="text-red-500">@{{ errors.deadline[0] }}</div>
                            </div>   
                                                
                            <div class="w-16 flex">
                                <button v-bind:class="['btn', (success ? 'bg-green-500' : 'bg-blue-500'), (processing ? 'opacity-50' : '')]" class="w-full appearance-none select-none float-right text-center text-white hover:bg-blue-200 leading-none ml-2  rounded" type="submit">
                                    <p>+</p>
                                </button>
                            </div>
                        </div>
                    </form>


                    {{-- <div v-if="response">
                        @{{ response }}
                    </div> --}}
                </div>
            </task-create>
            <div>
                
                <tasks inline-template>
                     <div class="w-full mt-6  border border-gray-200 rounded"> {{-- | 'OrderByDate' --}}
                        <div v-for="task in tasks" class="w-full py-3 px-4 border-b border-gray-200">
                            <img src="https://cdn.internetbureaubeterbekend.nl/crm/checklist.svg" class="mt-1 opacity-25 relative float-left w-4 mr-4 hover:opacity-75 cursor-pointer"/>
                            <p class="w-2/5 relative inline-block">@{{ task.name }}</p>
                            <?php //echo date('d-m-Y', strtotime(@task.deadline)); ?>
                            <p v-if="task.deadline" class="w-1/5 relative inline-block ml-12 text-gray-500">@{{ task.deadline | formatDate }}</p>
                            <p v-else class="w-1/5 relative inline-block ml-12 text-gray-500">-</p>
                        </div>
                    </div>
                </tasks>
            </div>
        </div>
    </div>
@endsection