<?php

function showFilter(){
    $filter = "
        <h3 class='text-center'>Filter</h3>
        <form action=".$_SERVER['PHP_SELF']." method='get' class='px-2'>
            <label for='lan'>Language</label>
            <div class='input-group input-group-sm mb-3'>
                <select class='form-select form-select-sm' id='lan' name='lan'>
                    <option value='*' selected>All</option>
                    <option value='sinhala'>Sinhala</option>
                    <option value='english'>English</option>
                    <option value='tamil'>Tamil</option>
                </select>
            </div>
            <label for='category'>Category</label>
            <div class='input-group input-group-sm mb-3'>
                <select class='form-select form-select-sm' id='category' name='category'>
                    <option value='*' selected>All</option>
                    <option value=''>Option 1</option>
                    <option value=''>Option 2</option>
                    <option value=''>Option 3</option>
                </select>
            </div>
            <label for='year'>Year</label>
            <div class='input-group input-group-sm mb-3'>
                <input type='number' class='form-control' id='year' name='year'>
            </div>
            <label for='author'>Author</label>
            <div class='input-group input-group-sm mb-3'>
                <input type='text' class='form-control' id='author' name='author'>
            </div>
            <label for='publisher'>Publisher</label>
            <div class='input-group input-group-sm mb-3'>
                <input type='text' class='form-control' id='publisher' name='publisher'>
            </div>
            <div class='d-flex filter-btns'>
                <input type='reset' class='ms-auto' value='Reset'>
                <input type='submit' value='Submit'>
            </div>
        </form>
    ";

    echo $filter;
}

?>