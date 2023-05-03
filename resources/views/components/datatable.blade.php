<div>
    <table class="table align-middle caption-top table-striped table-hover">
        <caption>Tabela de <b>{{ $title }}</b></caption>
        <thead class="table-dark">
        <tr>
            @php $cont=0; @endphp
            @foreach ($header as $item)

                @if($hide[$cont])
                    <th scope="col" class="d-none d-md-table-cell">{{ strtoupper($item) }}</th>
                @else
                    <th scope="col">{{ strtoupper($item) }}</th>
                @endif
                @php $cont++; @endphp

            @endforeach
        </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td class="d-none d-md-table-cell">{{ $item[$header[0]] }}</td>
                    <td>{{ $item[$header[1]] }}</td>
                    <td class="d-none d-md-table-cell">{{ $item[$header[2]] }}</td>
                    <td class="d-none d-md-table-cell">{{ $item[$header[3]] }}</td>
                    <td>
                        <a href= "{{ route($crud.'.edit', $item[$header[0]]) }}" class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/>
                                <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/>
                            </svg>
                        </a>
                        <a nohref style="cursor:pointer" onclick="showInfoModal('{{ $item[$header[1]] }}', '{{ $item[$header[2]] }}')" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                            </svg>
                        </a>
                        <div class="pt-2">
                        <form action="{{ route($crud.'.destroy', $item['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type='submit' value='Remover' class="btn btn-danger">
                        </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>