<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>comentario</th>
                <th>Active</th>
                <th>Perfil</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($websitecomment as $eachComment)
                <tr>
                    <td>{{ $eachComment->comment }}</td>
                    <td>
                        @if ($eachComment->active == 1)
                            {{ 'Active' }}
                        @else
                            {{ 'Inactive' }}
                        @endif
                    </td>
                    <td>
                        <a type="button" href="{{ route('profile_show', $eachComment->user_id) }}">Ver Perfil</a>
                    </td>
                    <td>
                        <a type="button" href="{{ route('web_site_comment_approve_edit', $eachComment->id) }}">edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>