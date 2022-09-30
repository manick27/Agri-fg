<div>
    <div class="search-bar">
        <form wire:submit.prevent="searchBy">
            <input type="text" wire:model="key_words" placeholder="Search...">
            <button type="submit"><i class="la la-search"></i></button>
        </form>
    </div><!--search-bar end-->
</div>
