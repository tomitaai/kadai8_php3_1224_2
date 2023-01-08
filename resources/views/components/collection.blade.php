        <tr class="px-4 py-4">
            <td class="x-4 py-4 m-2">{{ $date }}</td>
            <td class="x-4 py-4 m-2">{{ $slot }}</td>
            <td class="x-4 py-4 m-2">{{ $kind }}</td>
            <td>
                
                <div class="space-x-2 leading-3">
                    <span class="inline-flex items-center x-4 py-4 m-2">
                        <a href="{{ $url }}">
                            <button class="btn bg-gray-500 rounded-md py-1 px-2 font-light text-white">
                                詳細
                            </button>
                        </a>
                    </span>
              
                    <span class="inline-flex items-center x-4 py-4 m-2">
                        <form action="{{ url('booksedit/'.$id) }}" method="POST">
                             @csrf
                             
                            <button type="submit"  class="btn bg-gray-500 rounded-md py-1 px-2 font-light text-white">
                                更新
                            </button>
                            
                         </form>
                    </span>
            
            
            
                    <span class="inline-flex items-center x-4 py-4 m-2">
                        <form action="{{ url('book/'.$id) }}" method="POST">
                             @csrf
                             @method('DELETE')
                            
                            <button onclick="return confirm('本当に削除しますか？')" type="submit"  class="btn bg-gray-500 rounded-md py-1 px-2 font-light text-white">
                                削除
                            </button>
                        
                         </form>
                    </span>
                </div>
            </td>
        </tr>






        <!--            <div class="space-x-2 leading-3">-->
        <!--<span class="inline-flex items-center">-->

        <!--        <a href="{{ $url }}">-->
        <!--            <button class="btn bg-gray-500 rounded-md py-1 px-2 font-light text-white">-->
        <!--                詳細-->
        <!--            </button>-->
        <!--        </a>-->
        <!--                        </span>-->

        <!--        <form action="{{ url('booksedit/'.$id) }}" method="POST">-->
        <!--         @csrf-->
                 
        <!--            <button type="submit"  class="btn bg-gray-500 rounded-md py-1 px-2 font-light text-white">-->
        <!--                更新-->
        <!--            </button>-->
                    
        <!--         </form>-->
        <!--        <form action="{{ url('book/'.$id) }}" method="POST">-->
        <!--         @csrf-->
        <!--         @method('DELETE')-->
                
        <!--            <button onclick="return confirm('本当に削除しますか？')" type="submit"  class="btn bg-gray-500 rounded-md py-1 px-2 font-light text-white">-->
        <!--                削除-->
        <!--            </button>-->
            
        <!--        </form>-->
                
                
        <!--        </span>-->
        <!--        </div>-->
                
                
<!--</div>-->

<!--<div class="mt-5">-->
<!--  <div class="flex-1 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-2 border-b border-gray-500">-->
<!--      <h1 class="text-gray-600 font-medium">{{ $date }}{{ $slot }}</h1>-->
  


<!--    </div>-->
<!--</div>-->
