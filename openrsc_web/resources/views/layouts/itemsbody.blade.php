<section id="home">
    <div class="panel position-fixed table-wrapper-scroll-y">
        <div class="text-info table-dark spaced-body full-width">
            <div class="container border-left border-info border-right table-wrapper-scroll-y mCustomScrollbar"
              data-mcs-theme="minimal">
                <h2 class="h2 text-center pt-5 pb-5 text-capitalize display-3">Item Database</h2>
                <input type="text" class="pl-2 mb-2" id="inputBox" onkeyup="search()" placeholder="Search for an item">
                <table id="itemList" class="container table-striped table-hover table-dark text-primary">
                    <thead class="border-bottom border-info">
                    <tr class="text-info">
                        <th class="small pl-2">Name</th>
                        <th class="small">Description</th>
                        <th class="small text-center">Picture</th>
                        <th class="small">Req Level</th>
                        <th class="small">Shop Price</th>
                        <th class="small">Low Alch</th>
                        <th class="small">High Alch</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach ($items as $row)
                            <tr class="clickable-row" data-href="../itemdef/{{ $row->id }}">
                                <td width="25%">
                                    <a href="../itemdef/{{ $row->id }}" class="text-capitalize pl-2">{{ $row->name }} </a>
                                </td>
                                <td width="25%">
                                    <small>{{ $row->description }}</small>
                                </td>
                                <td width="10%" align="center" class="pt-1 pb-1">
                                    <div class="display-glow item{{ $row->id }}"></div>
                                </td>
                                 @if ($row->requiredLevel == 0)
                                    <td>
                                    </td>
                                 @else
                                    <td class="pt-1" width="10%" align="center">
                                        {{ number_format($row->requiredLevel) }}
                                    </td>
                                @endif
                                <td class="pt-1">
                                   {{number_format($row->basePrice) }}gp
                                </td>
                                <td class="pt-1">
                                    {{ number_format($row->basePrice * 0.4) }}gp
                                </td>
                                <td class="pt-1">
                                    {{ number_format($row->basePrice * 0.6) }}gp
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>