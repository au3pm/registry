# registry
AutoIt3 Package Registry

## Adding to the registry
Adding to the registry is done via **Issues**

The title of the issue is the package name

The following format is accepted by the **bot**:

```
repo
version
commit SHA-1 checksum
```

for example:

issue title: ref

```
registry
1.0.0
7a6f4cd5a1876f2cdd11e0b4a4b1cad25d4b95d5
```

If done as the au3pm organization, a package named **ref** would be created, pointing to the au3pm/registry repo, and version 1.0.0 would point the the commit with the SHA-1 checksum of **7a6f4cd5a1876f2cdd11e0b4a4b1cad25d4b95d5**

## Limitations
- Only repo's owned by the account creating the issue can be used.
- Only the creator of the package or au3pm members can edit packages
- Multiple packages cannot have the same name. The package name handling is case-insensitive.
