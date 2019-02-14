@php($title = "Create Server")

@extends('layouts.main')

@section('breadclumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">GameAP</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.servers.index') }}">{{ __('servers.game_servers') }}</a></li>
        <li class="breadcrumb-item active">{{ __('servers.create') }}</li>
    </ol>
@endsection

@section('content')
    @include('components.form.errors_block')

    {!! Form::open(['url' => route('admin.servers.index'), 'id' => 'adminServerForm']) !!}
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        Basic Info
                    </div>
                    <div class="card-body">
                        {{ Form::bsText('name') }}

                        <div class="form-group">
                            {{ Form::label('game_id', 'Game', ['class' => 'control-label']) }}
                            {{ Form::select('game_id', $games, null, ['class' => 'form-control', 'v-on:change' => 'gameChangeHandler', 'v-model' => 'gameId']) }}
                        </div>

                        <div class="form-group">
                            <template id="game-mod-list-template">
                                {{ Form::label('game_mod_id', 'Game Mod', ['class' => 'control-label']) }}

                                <select class="form-control" id="game_mod_id" name="game_mod_id">
                                    <option :value="gameMod.id" v-for="gameMod in gameModsList">@{{gameMod.name}}</option>
                                </select>
                            </template>
                        </div>

                        {{ Form::bsText('rcon') }}
                        {{ Form::bsText('dir') }}
                        {{ Form::bsText('su_user') }}
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        Dedicated server, IP, ports
                    </div>
                    <div class="card-body">
                        <div class="form-group" id="dedicatedServerForm">
                            {{ Form::label('ds_id', 'Dedicated server', ['class' => 'control-label']) }}
                            {{ Form::select('ds_id', $dedicatedServers, null, ['class' => 'form-control', 'v-on:change' => 'dsChangeHandler', 'v-model' => 'dsId']) }}
                        </div>

                        <div class="form-group">
                            <template id="ip-list-template">
                                {{ Form::label('server_ip', 'IP', ['class' => 'control-label']) }}

                                <select class='form-control' id='server_ip' name='server_ip'>
                                    <option :value="ip" v-for="ip in ipList">@{{ip}}</option>
                                </select>
                            </template>
                        </div>

                        {{ Form::bsText('server_port') }}
                        {{ Form::bsText('query_port') }}
                        {{ Form::bsText('rcon_port') }}
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        &nbsp;
                    </div>
                    <div class="card-body">
                        <div class="form-check">
                            {{ Form::checkbox('install', true, true, ['id' => 'install', 'class' => 'form-check-input']) }}
                            {{ Form::label('install', 'Install server', ['class' => 'form-check-label']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-12">
                <div class="form-group">
                    {{ Form::submit(__('main.create'), ['class' => 'btn btn-success']) }}
                </div>
            </div>
        </div>

    {!! Form::close() !!}
@endsection