<div class="search-toggle">
    <button type="button"></button>
</div>
<div class="search-input">
    <form class="form-horizontal" method="post" action="<?php echo home_url(); ?>" _lpchecked="1">
        <input type="text" class="form-control" placeholder="Enter keyword then hit Enter" name="s" id="s" value="" onfocus="if(this.value=='Search this Site...')this.value='';" x-webkit-speech onwebkitspeechchange="transcribe(this.value)">
        <input type="submit" value="search" class="submit-disabled">
    </form>
</div>
