#!/bin/bash

# Print commands to the screen
set -x

# Catch errors
set -euo pipefail

pushd themes/10up-theme
npm install && npm run build
popd
