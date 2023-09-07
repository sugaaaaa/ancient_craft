@foreach($postlist as $item)
 <tr>
    <td>{{$loop -> iteration}}</td>
    <td>{{$item -> title}}</td>
    <td>{{$item -> content}}</td>
    <td>{{$item -> image}}</td>
    <td>{{$item -> Catecgory}}</td>
 </tr>
@endforeach