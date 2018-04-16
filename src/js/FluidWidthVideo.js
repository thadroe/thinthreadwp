export default function() {
  jQuery(document).ready(function() {
    jQuery('iframe[src*="youtube.com"], iframe[src*="vimeo.com"]').wrap(
      '<div class="fluid-video" />'
    );
  });
}
