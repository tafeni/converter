<table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th>Influencer</th>
        <th>Code </th>
        <th>Bookmaker</th>
        <th>Odds</th>
        <th>Date</th>
    </tr>
    </thead>
    <tbody>

    @forelse($trending as $key => $list)
        <tr>
            <th scope="row">{{ $key + $trending->firstItem() }}</th>
            <td class="text-uppercase">{{$list->influencer}}</td>
            <td>{{$list->code}}</td>
            <td>{{$list->booky}}</td>
            <td>{{$list->odd}}</td>
            <td>{{$list->day}}</td>
        </tr>
    @empty
        <tr><td class="text-danger font-large-1 text-center text-capitalize" colspan="6">No record exist at the moment</td></tr>
    @endforelse
</table>

{{ $trending->links() }}
