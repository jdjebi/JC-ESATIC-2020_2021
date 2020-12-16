<?php

namespace App\RESAC\Core\Posts;

class PostRenderer{

    static function render_posts($posts_to_render){
        // Transforme les liens de chaque publication en lien cliquable
        // Colorie les hashtags

        $posts = [];
        
        foreach($posts_to_render as $post){

            $posts[] = PostRenderer::render_post($post);
            
        }

        return $posts;
    }

     static function render_post($post_to_render){
    
        $content = $post_to_render->content;

        $content = PostRenderer::link_to_html_link($content);
        $content = PostRenderer::mark_hashtags_content($content);

        $post_to_render->content = $content;

        return $post_to_render;
    }

    /* Marquage des hashtags */
    static function mark_hashtags_content($content){

        $regex = "#\#[a-zA-Z0-9._/-]+#";
        $replace_by = '<b class="resac-post-hashtag" href="$0">$0</b>';

        $content = preg_replace($regex,$replace_by,$content);

        return $content;
    }


    /* Transformation des liens de chaque publication en lien cliquable */
   
    static function transform_link_to_html_link($post){
        // Transforme les liens de la publication en lien cliquable
        
        $content = $post->content;
        $post->content = PostRenderer::link_to_html_link($content);

        return $post;
    }

    static function link_to_html_link($content){
        // Transforme les liens de la publication en lien cliquable

        $regex = "#(https?://)(\w+\.)*(\w+)(\.([a-z]{2,4})|:\d+)(((/)|(\\\))([a-zA-Z0-9-\#._=?]*))*#";

        $replace_by = '<a class="resac-post-link" href="$0">$0</a>';

        $content = preg_replace($regex,$replace_by,$content);
                
        return $content;
    }

}