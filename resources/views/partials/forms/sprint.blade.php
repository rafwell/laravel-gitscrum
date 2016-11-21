<div class="col-lg-8">
    <div class="ibox">
        <div class="ibox-content">

            <form action="{{route($route, ['slug'=>@$sprint->slug])}}" method="post" class="form-horizontal">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{_('Product Backlog')}}</label>
                    <div class="col-sm-9">
                        <select name="product_backlog_id" class="form-control m-b">
                            @foreach (Auth::user()->productBacklogs() as $productBacklog)
                            <option value="{{$productBacklog->id}}"
                                @if ( @$productBacklog_id == $productBacklog->id ) selected="selected" @endif >
                                    {{$productBacklog->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{_('Timebox')}}</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="daterange" value="{{ @$sprint->date_start }}@if(@$sprint->date_start) - @endif{{ @$sprint->date_finish }}" required />
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{_('Title')}}</label>
                    <div class="col-sm-9">
                        <input name="title" type="text" class="form-control" value="{{ @$sprint->title }}" required>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{_('Description')}}</label>
                    <div class="col-sm-9">
                        <textarea name="description" type="text" class="form-control" required>{{ @$sprint->description }}</textarea>
                        <span class="help-block m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{_('Version')}}</label>
                    <div class="col-sm-2">
                        <input name="version" type="text" placeholder="1.0.1" class="form-control m-b-none">
                    </div>
                    <label class="col-sm-3 control-label">{{_('Public')}}</label>
                    <div class="col-sm-4">
                        <select name="is_private" class="form-control m-b">
                            <option value="0">{{_('Yes, publish for team')}}</option>
                            <option value="1">{{_('No, Display only for me')}}</option>
                        </select>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                @include('partials.includes.form-btn-submit', ['action' => @$action])
            </form>

        </div>
    </div>
</div>