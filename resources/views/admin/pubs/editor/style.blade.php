<link href="{{ asset('asset/lib/quill/quill.bubble.css') }}" rel="stylesheet">
<style>
    .quill-box{
        border: none
    }
    #editor{
        height: 130px;
    }
    .ql-editor.ql-blank::before {
        color: rgba(0,0,0,0.6);
        content: attr(data-placeholder);
        font-style: normal !important;
        left: 15px;
        pointer-events: none;
        position: absolute;
        right: 15px;
    }   
    #editor {
        height: auto;
        min-height: 130px;
    }
    #editor .ql-editor {
        font-size: 15px;
        overflow-y: visible; 
    }
    #scrolling-container {
        height: 100%;
        min-height: 100%;
        overflow-y: auto;
    }
</style>