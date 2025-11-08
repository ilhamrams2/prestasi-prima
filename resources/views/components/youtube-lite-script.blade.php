@once('youtube-lite-global-script')
  @push('scripts')
    <script>
      document.addEventListener('DOMContentLoaded', () => {
        const initLiteYouTubeWrappers = () => {
          document.querySelectorAll('.youtube-lite').forEach((wrapper) => {
            if (wrapper.dataset.youtubeReady === '1') {
              return;
            }

            const button = wrapper.querySelector('button');
            const videoId = wrapper.dataset.youtubeId;
            const title = wrapper.dataset.title || 'YouTube video';
            const behavior = wrapper.dataset.behavior || 'inline';

            if (!button || !videoId) {
              wrapper.dataset.youtubeReady = '1';
              return;
            }

            const playInline = () => {
              const embedUrl = `https://www.youtube-nocookie.com/embed/${videoId}?autoplay=1&modestbranding=1&rel=0`;
              const iframe = document.createElement('iframe');
              iframe.className = 'w-full aspect-video rounded-2xl';
              iframe.setAttribute('src', embedUrl);
              iframe.setAttribute('title', title);
              iframe.setAttribute('loading', 'lazy');
              iframe.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share');
              iframe.setAttribute('allowfullscreen', 'allowfullscreen');
              iframe.setAttribute('referrerpolicy', 'strict-origin-when-cross-origin');
              wrapper.replaceChildren(iframe);
            };

            button.addEventListener('click', (event) => {
              event.preventDefault();
              if (behavior === 'modal') {
                if (typeof window.openVideoModal === 'function') {
                  window.openVideoModal(videoId, title);
                }
              } else {
                playInline();
              }
            });

            wrapper.dataset.youtubeReady = '1';
          });
        };

        initLiteYouTubeWrappers();
        document.addEventListener('turbo:load', initLiteYouTubeWrappers);
      });
    </script>
  @endpush
@endonce
