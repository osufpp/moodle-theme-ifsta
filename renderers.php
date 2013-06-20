<?php

class theme_ifsta_core_renderer extends core_renderer
{
    /**
     * Produces a header for a block
     *
     * @param block_contents $bc
     * @return string
     */
    protected function block_header(block_contents $bc)
    {

        $title = '';
        if ($bc->title) {
            $attributes = array();
            if ($bc->blockinstanceid) {
                $attributes['id'] = 'instance-' . $bc->blockinstanceid . '-header';
            }
            $title = html_writer::tag('span', $bc->title, $attributes);
        }

        $controlshtml = $this->block_controls($bc->controls);

        $output = '';
        if ($title || $controlshtml) {
            $output .= html_writer::tag('div',
                html_writer::tag('div',
                    html_writer::tag('div', '', array('class' => 'block_action'))
                         . $title . $controlshtml,
                array('class' => 'title')),
            array('class' => 'header ui-widget-header ui-corner-top infoBoxHeading'));
        }
        return $output;
    }

    /**
     * Prints a nice side block with an optional header.
     *
     * The content is described
     * by a {@link core_renderer::block_contents} object.
     *
     * <div id="inst{$instanceid}" class="block_{$blockname} block">
     *      <div class="header"></div>
     *      <div class="content">
     *          ...CONTENT...
     *          <div class="footer">
     *          </div>
     *      </div>
     *      <div class="annotation">
     *      </div>
     * </div>
     *
     * @param block_contents $bc HTML for the content
     * @param string $region the region the block is appearing in.
     * @return string the HTML to be output.
     */
    public function block(block_contents $bc, $region) {
        $bc = clone($bc); // Avoid messing up the object passed in.
        if (empty($bc->blockinstanceid) || !strip_tags($bc->title)) {
            $bc->collapsible = block_contents::NOT_HIDEABLE;
        }
        $skiptitle = strip_tags($bc->title);
        if ($bc->blockinstanceid && !empty($skiptitle)) {
            $bc->attributes['aria-labelledby'] = 'instance-'.$bc->blockinstanceid.'-header';
        } else if (!empty($bc->arialabel)) {
            $bc->attributes['aria-label'] = $bc->arialabel;
        }
        if ($bc->collapsible == block_contents::HIDDEN) {
            $bc->add_class('hidden');
        }
        if (!empty($bc->controls)) {
            $bc->add_class('block_with_controls');
        }
        $bc->add_class('ui-widget infoBoxContainer ui-corner-all');


        if (empty($skiptitle)) {
            $output = '';
            $skipdest = '';
        } else {
            $output = html_writer::tag('a', get_string('skipa', 'access', $skiptitle), array('href' => '#sb-' . $bc->skipid, 'class' => 'skip-block'));
            $skipdest = html_writer::tag('span', '', array('id' => 'sb-' . $bc->skipid, 'class' => 'skip-block-to'));
        }

        $output .= html_writer::start_tag('div', $bc->attributes);

        $output .= $this->block_header($bc);
        $output .= $this->block_content($bc);

        $output .= html_writer::end_tag('div');

        $output .= $this->block_annotation($bc);

        $output .= $skipdest;

        $this->init_block_hider_js($bc);
        return $output;
    }

    /**
     * Produces the content area for a block
     *
     * @param block_contents $bc
     * @return string
     */
    protected function block_content(block_contents $bc) {
        $output = html_writer::start_tag('div', array('class' => 'content ui-widget-content ui-corner-bottom infoBoxContents'));
        if (!$bc->title && !$this->block_controls($bc->controls)) {
            $output .= html_writer::tag('div', '', array('class'=>'block_action notitle'));
        }
        $output .= $bc->content;
        $output .= $this->block_footer($bc);
        $output .= html_writer::end_tag('div');

        return $output;
    }

};
