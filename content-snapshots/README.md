# Content snapshots

These files are **not the live source** — the real content lives in the WordPress
database (`wp_posts.post_content`) on the wp-new staging site, edited directly via
WP-CLI over SSH (see the main README's "Продакшн / хостинг" section).

Each file here is a snapshot of one post/page's `post_content`, named
`<post ID>-<short slug>.html`, taken right after a WP-CLI edit so git has a
history of what changed and why (commit messages carry the "why").

To refresh a snapshot after editing a page directly on the server:

```
ssh igraphite "php8.1 \$(which wp) post get <ID> --path=/home/wpotas/igraphite.pl/www/wp-new --field=content" > content-snapshots/<ID>-<slug>.html
```

Editing a file here does **not** change the live site — it's a read-only mirror.
To actually change content, edit via WP-CLI (or wp-admin) against the server,
then re-run the command above to update the snapshot.

Current snapshots (as of 2026-07-23):

| File | Page |
|---|---|
| `15-home-pl.html` | PL homepage |
| `53-home-en.html` | EN homepage (`home-en`) |
| `17-kontakt.html` | PL contact page |
| `56-contacts-en.html` | EN contact page |
| `59-products-en.html` | EN products catalog |
