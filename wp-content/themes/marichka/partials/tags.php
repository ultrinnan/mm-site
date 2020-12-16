<?php
declare( strict_types=1 );

$tags = get_the_tags();
if ($tags) {
	$html = '<div class="container tags">';
	foreach ( $tags as $tag ) {
		$tag_link = get_tag_link( $tag->term_id );
		$name = '#' . str_replace(' ', '_', $tag->name);

		$html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='tag'>";
		$html .= "{$name}</a>";
	}
	$html .= '</div>';
	echo $html;
}

