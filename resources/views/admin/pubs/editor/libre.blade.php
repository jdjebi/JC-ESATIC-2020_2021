@extends('admin.base')

@section('extras_style')
@parent
@include('app.publications.style')
<link href="{{ asset('asset/lib/quill/quill.bubble.css') }}" rel="stylesheet">
<style>
    body{
        background-color: #fff
    }
</style>
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
@endsection

@section('main-content')
<div>
    <div class="nav-scroller bg-white shadow-sm">
        <nav class="nav nav-underline">
          <a class="nav-link active" href="{{ route("admin.pubs_dashboard") }}">Editeur</a>
        </nav>
      </div>
      @include('flash')
</div>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-sm-12">
            <div class="h5 text-muted">Nouvelle publication &middot; <b>Libre</b> </div>
            @include('admin.pubs.editor.libre_form')
        </div>
    </div>
</div>
@endsection
