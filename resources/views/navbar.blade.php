{{--@extends('navigation-dropdown')--}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Administrador') }}
        </h2>
    </x-slot>

<style>
    /*
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
*/
    /*
        Created on : 08-nov-2020, 10:58:39
        Author     : espileto
    */

    body#admin{
        background-color: #e6ebefc4;
    }
    body#estudent{
        background-color: #2f773124;
    }

    body#login form{
        margin-top: 50px;
        padding-top: 10px;
        padding-bottom: 10px;
        border-radius:10px;
    }

    .editasign{
        border:1px solid #80808033;
        border-radius: 5px;
    }

    form.asignatio .form-group{
        padding: 15px 20px;
    }

    .asignatio label{
        font-weight: 500;
        color:darkgray;
    }
    input.fullwidth{
        width:100%!important;
        margin-bottom: 20px!important;

    }
    input.asign{
        width: 75px!important;
        flex:unset!important;
        border:none;
    }
    input.color{

        width:50px;
        padding: 1px 5px;
        height: 25px;
        margin-left: 10px;
    }

    .botonasignar{
        position:absolute;
        bottom:10px;
    }

    input.salir{

        color:red!important;
        font-weight: bold;
        border:none;
        background-color: transparent;
    }
</style>

<script>
  //  jQuery('.dropdown-toggle').dropdown();
</script>
</x-app-layout>
