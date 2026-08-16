# GT HOMES Logo — Placement Guide

Place the official GT HOMES logo file here:

```
assets/images/branding/logo.png
```

## Logo Requirements

- **Format**: PNG (with the original yellow background preserved)
- **Background**: DO NOT make the logo transparent. The yellow background is part of the brand identity.
- **Naming**: The file must be named exactly `logo.png`
- **Proportions**: Do not stretch or distort the logo.
- **Do not**: Recreate the logo using text, AI generation, or CSS.

## Favicon

A smaller version for browser tabs:
```
assets/images/branding/favicon.png
```

Recommended size: 32×32px or 64×64px.

## Usage in Code

The logo is referenced via the `asset()` helper:

```php
<img src="<?= asset('images/branding/logo.png') ?>" alt="GT HOMES Holiday Resort Logo">
```

The `asset()` function generates the correct full URL regardless of deployment environment.
