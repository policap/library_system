
    <tr>
        <td class="py-1">
            {{ $_book->title }}
        </td>
        <td>
          {{ $_book->author }}
        </td>
        <td>
          {{ $_book->size }}
        </td>
        <td>
          {{ $_book->date }}
        </td>
        
        <td>
          
            <a href="{{ route('admin.books.edit',[$_book->id]) }}" class="btn btn-primary btn-xs">edit</a>|
            <a href="{{ route('admin.books.show',[$_book->id]) }}" class="btn btn-success btn-xs">view</a>|
            <a href="{{ route('admin.books.destroy',[$_book->id]) }}" class="btn btn-danger btn-xs">delete</a>|
          
        </td>
       
      </tr>
     