<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3>All Plans</h3>
                    @if ($subscriptions->count())
                        <table>
                            <tr>
                                <th>Name</th>
                                <th>Paddle Id</th>
                                <th>Paddle Status</th>
                                <th>Paddle Plan</th>
                            </tr>
                            <tbody>
                                @foreach ($subscriptions as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->paddle_id}}</td>
                                    <td>{{$item->paddle_status}}</td>
                                    <td>{{$item->paddle_plan}}</td>
                                    <td>
                                        <a href="/cancel/{{$item->id}}">Cancel</a>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    @endif
                    <form action="/subscribe" method="post">
                        @csrf
                        <select name="plan" id="plan">
                            @foreach ($plans as $item)
                                <option value="{{$item}}">{{$item->name}} | ${{$item->price}}</option>
                            @endforeach
                        </select>

                        <button class="px-2 py-3 my-2 bg-gray-200  hover:bg-blue-400" type="submit">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
