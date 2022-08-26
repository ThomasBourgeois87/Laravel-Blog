<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategoryDropdown extends Component
{
    public function render(): View
    {
        return view('components.category-dropdown', [
            'categories' => Category::all(),
            'currentCategory' => Category::firstWhere('slug', request('category'))
        ]);
    }
}
