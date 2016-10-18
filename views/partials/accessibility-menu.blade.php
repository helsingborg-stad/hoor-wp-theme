@if (function_exists('ReadSpeakerHelper_playButton'))
<div class="c-accessibility-menu hidden-print" aria-label="<?php _e('Listen to this page with ReadSpeaker', 'hoor'); ?>">
    {!! ReadSpeakerHelper_playButton() !!}

    @if (function_exists('ReadSpeakerHelper_player'))
    	{!! ReadSpeakerHelper_player() !!}
	@endif
</div>
@endif