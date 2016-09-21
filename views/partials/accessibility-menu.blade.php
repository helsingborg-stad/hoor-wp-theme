@if (function_exists('ReadSpeakerHelper_playButton'))
<div class="c-accessibility-menu" aria-label="<?php _e('Listen to this page with ReadSpeaker', 'hoor'); ?>">
    {!! ReadSpeakerHelper_playButton() !!}
</div>
@endif

@if (function_exists('ReadSpeakerHelper_player'))
    {!! ReadSpeakerHelper_player() !!}
@endif
