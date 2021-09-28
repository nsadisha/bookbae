<?php

function showFilter($q){
    global $language, $category, $year, $author;

    $filter = "
        <h3 class='text-center'>Filter</h3>
        <form action='search.php' method='get' class='px-2'>
            <input type='hidden' name='q' value='$q'>
            <label for='lan'>Language</label>
            <div class='input-group input-group-sm mb-3'>
                <select class='form-select form-select-sm' id='lan' name='lan'>
                    <option value='' ".($language==""?'selected':'').">All</option>
                    <option value='sinhala' ".($language=="sinhala"?'selected':'').">Sinhala</option>
                    <option value='english' ".($language=="english"?'selected':'').">English</option>
                    <option value='tamil' ".($language=="tamil"?'selected':'').">Tamil</option>
                </select>
            </div>
            <label for='category'>Category</label>
            <div class='input-group input-group-sm mb-3'>
                <select class='form-select form-select-sm' id='category' name='category'>
                    <option value='' ".($category==""?'selected':'').">All</option>
                    <option value='adventure' ".($category=="adventure"?'selected':'').">Adventure</option>
                    <option value='biography' ".($category=="biography"?'selected':'').">Biography</option>
                    <option value='children' ".($category=="children"?'selected':'').">Children books</option>
                    <option value='fantasy' ".($category=="fantasy"?'selected':'').">Fantasy</option>
                    <option value='historical' ".($category=="historical"?'selected':'').">Historical</option>
                    <option value='inspirational' ".($category=="inspirational"?'selected':'').">Inspirational</option>
                    <option value='romance' ".($category=="romance"?'selected':'').">Romance</option>
                    <option value='science' ".($category=="science"?'selected':'').">Science</option>
                    <option value='short' ".($category=="short"?'selected':'').">Short stories</option>
                    <option value='thriller-crime' ".($category=="thriller-crime"?'selected':'').">Thriller-crime</option>
                </select>
            </div>
            <label for='year'>Year</label>
            <div class='input-group input-group-sm mb-3'>
                <input type='number' class='form-control' id='year' name='year' min='1800' value='$year'>
            </div>
            <label for='author'>Author</label>
            <div class='input-group input-group-sm mb-3'>
                <input type='text' class='form-control' id='author' name='author' value='$author'>
            </div>
            <div class='d-flex filter-btns'>
                <input type='reset' class='ms-auto' value='Reset'>
                <input type='submit' name='filter' value='Filter'>
            </div>
        </form>
    ";

    echo $filter;
}

?>