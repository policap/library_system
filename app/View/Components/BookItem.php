<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BookItem extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $_book;
    //$this->$_book is from private then =$_book is from construct
    public function __construct($book)
    {
        $this->_book = $book;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.book-item', ['$_book'=>$this->_book]);
    }
}
