import { StatusBar } from 'expo-status-bar';
import { StyleSheet, Text, View } from 'react-native';
import { NavigationContainer } from '@react-navigation/native';
import { createNativeStackNavigator } from '@react-navigation/native-stack';
import { TelaInicial } from './components/TelaInicial';

const Stack = createNativeStackNavigator();

export default function App() {
  return (
   <NavigationContainer>
    <Stack.Navigator initialRouteName='TelaInicial'>
      <Stack.Screen name="TelaInicial" component={TelaInicial}/>          
    </Stack.Navigator>
   </NavigationContainer>

  );
}
