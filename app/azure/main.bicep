@description('The name of the app service to be created.')
param webAppName string = 'pb-chlebicky-${uniqueString(resourceGroup().id)}'

@description('The location for all resources.')
param location string = resourceGroup().location

@description('The SKU of the App Service Plan.')
@allowed([
  'F1'
  'B1'
  'B2'
  'B3'
  'S1'
  'S2'
  'S3'
])
param sku string = 'B1' // B1 is the cheapest production-ready tier. F1 is free but limited.

@description('The PHP version to use.')
@allowed([
  'PHP|8.0'
  'PHP|8.1'
  'PHP|8.2'
])
param phpVersion string = 'PHP|8.0'

resource appServicePlan 'Microsoft.Web/serverfarms@2022-03-01' = {
  name: '${webAppName}-plan'
  location: location
  sku: {
    name: sku
  }
  kind: 'linux'
  properties: {
    reserved: true
  }
}

resource webApp 'Microsoft.Web/sites@2022-03-01' = {
  name: webAppName
  location: location
  kind: 'app,linux,php'
  properties: {
    serverFarmId: appServicePlan.id
    siteConfig: {
      linuxFxVersion: phpVersion
      appCommandLine: 'cp /home/site/wwwroot/deployment/nginx.conf /etc/nginx/sites-available/default && service nginx reload'
      appSettings: [
        {
          name: 'APP_ENV'
          value: 'production'
        }
        {
          name: 'APP_DEBUG'
          value: 'false'
        }
        {
          name: 'APP_KEY'
          value: 'base64:GENERATE_THIS_AND_UPDATE_LATER'
        }
        {
          name: 'DB_CONNECTION'
          value: 'sqlite'
        }
        {
          name: 'DB_DATABASE'
          value: '/home/site/wwwroot/database/database.sqlite'
        }
        {
          name: 'LOG_CHANNEL'
          value: 'errorlog'
        }
      ]
    }
    httpsOnly: true
  }
}

output webAppUrl string = webApp.properties.defaultHostName
