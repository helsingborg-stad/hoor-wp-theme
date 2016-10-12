<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>{{ wp_title('&mdash;', false, 'right') }}{{ get_bloginfo('name') }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="{{ bloginfo('description') }}" />
  <meta name="pubdate" content="{{ the_time('Y-m-d') }}">
  <meta name="moddate" content="{{ the_modified_time('Y-m-d') }}">
  <script>
    var ajaxurl = '{!! apply_filters('Municipio/ajax_url_in_head', admin_url('admin-ajax.php')) !!}';
  </script>
  {!! wp_head() !!}
</head>
<body {!! body_class('no-js') !!}>
  <a href="#main-menu" class="visually-hidden visually-hidden--focusable skip"><?php _e('Jump to the main menu', 'municipio'); ?></a>
  <a href="#main-content" class="visually-hidden visually-hidden--focusable skip"><?php _e('Jump to the main content', 'municipio'); ?></a>

    @if (isset($notice) && !empty($notice))
        <div class="notices">
        @if (!isset($notice['text']) && is_array($notice))
            @foreach ($notice as $notice)
                @include('partials.notice')
            @endforeach
        @else
            @include('partials.notice')
        @endif
        </div>
    @endif

    @if (get_field('show_google_translate', 'option') == 'header')
        @include('partials.translate')
    @endif

    @include('partials.header')

    <main id="main-content" class="clearfix">
        @yield('content')

        @if (is_active_sidebar('content-area-bottom'))
        <div class="container gutter-xl gutter-vertical sidebar-content-area-bottom">
            <div class="grid">
                <?php dynamic_sidebar('content-area-bottom'); ?>
            </div>
        </div>
        @endif
    </main>

    @include('partials.footer')

    @if (in_array(get_field('show_google_translate', 'option'), array('footer', 'fold')))
        @include('partials.translate')
    @endif

    {!! wp_footer() !!}

</body>
</html>
